var cal = {
  // (A) PROPERTIES
  mon: false, // monday first
  events: null, // events data for current month/year
  sMth: 0,
  sYear: 0, // selected month & year
  hMth: null,
  hYear: null, // html month & year
  hCD: null,
  hCB: null, // html calendar days & body
  // html form & fields
  hFormWrap: null,
  hForm: null,
  hfID: null,
  hfStart: null,
  hfEnd: null,
  hfTxt: null,
  hfColor: null,
  hfStatus: null,
  hfBG: null,
  hfSave: null,
  hfDel: null,
  hfCancel: null,

  // (B) SUPPORT FUNCTION - AJAX FETCH
  ajax: (data, onload) => {
    // (B1) FORM DATA
    let form = new FormData();
    for (let [k, v] of Object.entries(data)) {
      form.append(k, v);
    }

    // (B2) FETCH data from input  here ==============================================
    // Fetch data from the first PHP file
    fetch("ajax_request.php", {
        method: "POST",
        body: form
      })
      .then(res => res.text())
      .then(txt => onload(txt))
      .catch(err => console.error(err));
  },

  // (C) INIT CALENDAR
  init: () => {
    // (C1) GET HTML ELEMENTS
    cal.hMth = document.getElementById("calMonth");
    cal.hYear = document.getElementById("calYear");
    cal.hCD = document.getElementById("calDays");
    cal.hCB = document.getElementById("calBody");
    cal.hFormWrap = document.getElementById("calForm");
    cal.hForm = cal.hFormWrap.querySelector("form");
    cal.hfID = document.getElementById("evtID");
    cal.hfStart = document.getElementById("evtStart");
    cal.hfEnd = document.getElementById("evtEnd");

    cal.hfTxt = document.getElementById("evtTxt");
    cal.hfColor = document.getElementById("evtColor");
    cal.hfBG = document.getElementById("evtBG");
    cal.hfStatus = document.getElementById("evtStatus");
    cal.hfSave = document.getElementById("evtSave");
    cal.hfDel = document.getElementById("evtDel");
    cal.hfCancel = document.getElementById("evtCancel");
    cal.hfType = document.getElementById("evtType");

    // (C2) ATTACH CONTROLS
    cal.hMth.onchange = cal.load;
    cal.hYear.onchange = cal.load;
    document.getElementById("calBack").onclick = () => cal.pshift();
    document.getElementById("calNext").onclick = () => cal.pshift(1);
    document.getElementById("calAdd").onclick = () => cal.show();
    cal.hForm.onsubmit = () => cal.save();
    // document.getElementById("evtCX").onclick = () => cal.hFormWrap.close();
    document.getElementById("evtCX").onclick = () => {
      cal.hFormWrap.close();
      location.reload();
    };
    cal.hfDel.onclick = cal.del;
    cal.hfCancel.onclick = cal.cncl;

    // (C3) DRAW DAY NAMES
    let days = ["MON", "TUE", "WED", "THU", "FRI", "SAT"];

    if (cal.mon) {
      days.push("Sunday");
    } else {
      days.unshift("SUN");
    }
    for (let d of days) {
      let cell = document.createElement("div");
      cell.className = "calCell";
      cell.innerHTML = d;
      cal.hCD.appendChild(cell);
    }

    // (C4) LOAD & DRAW CALENDAR
    cal.load();
  },

  // (D) SHIFT CURRENT PERIOD BY 1 MONTH
  pshift: forward => {
    cal.sMth = parseInt(cal.hMth.value);
    cal.sYear = parseInt(cal.hYear.value);
    if (forward) {
      cal.sMth++;
    } else {
      cal.sMth--;
    }
    if (cal.sMth > 12) {
      cal.sMth = 1;
      cal.sYear++;
    }
    if (cal.sMth < 1) {
      cal.sMth = 12;
      cal.sYear--;
    }
    cal.hMth.value = cal.sMth;
    cal.hYear.value = cal.sYear;
    cal.load();
  },

  // (E) LOAD EVENTS
  load: () => {
    cal.sMth = parseInt(cal.hMth.value);
    cal.sYear = parseInt(cal.hYear.value);
    cal.ajax({
      req: "get",
      month: cal.sMth,
      year: cal.sYear
    }, events => {
      cal.events = JSON.parse(events);
      cal.draw();
    });
  },

  // (F) DRAW CALENDAR
  draw: () => {
    // (F1) CALCULATE DAY MONTH YEAR
    // note - jan is 0 & dec is 11 in js
    // note - sun is 0 & sat is 6 in js
    let daysInMth = new Date(cal.sYear, cal.sMth, 0).getDate(), // number of days in selected month
      startDay = new Date(cal.sYear, cal.sMth - 1, 1).getDay(), // first day of the month
      endDay = new Date(cal.sYear, cal.sMth - 1, daysInMth).getDay(), // last day of the month
      now = new Date(), // current date
      nowMth = now.getMonth() + 1, // current month
      nowYear = parseInt(now.getFullYear()), // current year
      nowDay = cal.sMth == nowMth && cal.sYear == nowYear ? now.getDate() : null;

    // (F2) DRAW CALENDAR ROWS & CELLS
    // (F2-1) INIT + HELPER FUNCTIONS
    let rowA, rowB, rowC, rowMap = {},
      rowNum = 1,
      cell, cellNum = 1,
      rower = () => {
        rowA = document.createElement("div");
        rowB = document.createElement("div");
        rowC = document.createElement("div");
        rowA.className = "calRow";
        rowA.id = "calRow" + rowNum;
        rowB.className = "calRowHead";
        rowC.className = "calRowBack";
        cal.hCB.appendChild(rowA);
        rowA.appendChild(rowB);
        rowA.appendChild(rowC);
      },
      celler = day => {
        cell = document.createElement("div");
        cell.className = "calCell";
        if (day) {
          cell.innerHTML = day;
        }
        rowB.appendChild(cell);
        cell = document.createElement("div");
        cell.className = "calCell";
        if (day === undefined) {
          cell.classList.add("calBlank");
        }
        if (day !== undefined && day == nowDay) {
          cell.classList.add("calToday");
        }
        rowC.appendChild(cell);
      };
    cal.hCB.innerHTML = "";
    rower();

    // (F2-2) BLANK CELLS BEFORE START OF MONTH
    if (cal.mon && startDay != 1) {
      let blanks = startDay == 0 ? 7 : startDay;
      for (let i = 1; i < blanks; i++) {
        celler();
        cellNum++;
      }
    }
    if (!cal.mon && startDay != 0) {
      for (let i = 0; i < startDay; i++) {
        celler();
        cellNum++;
      }
    }

    // (F2-3) DAYS OF THE MONTH
    for (let i = 1; i <= daysInMth; i++) {
      rowMap[i] = {
        r: rowNum,
        c: cellNum
      };
      celler(i);
      if (i != daysInMth && cellNum % 7 == 0) {
        rowNum++;
        rower();
      }
      cellNum++;
    }

    // (F2-4) BLANK CELLS AFTER END OF MONTH
    if (cal.mon && endDay != 0) {
      let blanks = endDay == 6 ? 1 : 7 - endDay;
      for (let i = 0; i < blanks; i++) {
        celler();
        cellNum++;
      }
    }
    if (!cal.mon && endDay != 6) {
      let blanks = endDay == 0 ? 6 : 6 - endDay;
      for (let i = 0; i < blanks; i++) {
        celler();
        cellNum++;
      }
    }

    // (F3) DRAW EVENTS
    if (cal.events !== false) {
      for (let [id, evt] of Object.entries(cal.events)) {
        // (F3-1) EVENT START & END DAY
        let sd = new Date(evt.s),
          ed = new Date(evt.e);
        if (sd.getFullYear() != cal.sYear) {
          sd = 1;
        } else {
          sd = sd.getMonth() + 1 < cal.sMth ? 1 : sd.getDate();
        }
        if (ed.getFullYear() != cal.sYear) {
          ed = daysInMth;
        } else {
          ed = ed.getMonth() + 1 > cal.sMth ? daysInMth : ed.getDate();
        }

        // (F3-2) "MAP" ONTO HTML CALENDAR
        cell = {};
        rowNum = 0;
        for (let i = sd; i <= ed; i++) {
          if (rowNum != rowMap[i]["r"]) {
            cell[rowMap[i]["r"]] = {
              s: rowMap[i]["c"],
              e: 0
            };
            rowNum = rowMap[i]["r"];
          }
          if (cell[rowNum]) {
            cell[rowNum]["e"] = rowMap[i]["c"];
          }
        }

        // (F3-3) DRAW HTML EVENT ROW
        for (let [r, c] of Object.entries(cell)) {
          let o = c.s - 1 - ((r - 1) * 7), // event cell offset
            w = c.e - c.s + 1; // event cell width
          rowA = document.getElementById("calRow" + r);
          rowB = document.createElement("div");
          rowB.className = "calRowEvt";



          if (cal.events[id]["type"] === "ADMIN") {
            rowB.innerHTML = cal.events[id]["name"] + "  |  " + cal.events[id]["s"];
          } else if (cal.events[id]["type"] === "USER" && cal.events[id]["user_id"] === cal.events[id]["user_id_session"]) { // && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["usernameSESSION"]
            rowB.innerHTML = cal.events[id]["name"] + "  -  " + cal.events[id]["s"];
          } else {
            rowB.style.display = "none";
          }


          if (cal.events[id]["status"] === "PENDING") {
            rowB.style.backgroundColor = "#F9F54B";
            rowB.style.color = "#202326";
          } else if (cal.events[id]["status"] === "APPROVED") {
            rowB.style.backgroundColor = "#137c23";
            rowB.style.color = "#FFFFFF";
          } else if (cal.events[id]["status"] === "REJECTED") {
            rowB.style.backgroundColor = "#952323";
            rowB.style.color = "#ffe9ec";
          }

          rowB.classList.add("w" + w);
          if (o != 0) {
            rowB.classList.add("o" + o);
          }
          rowB.onclick = () => cal.show(id);
          rowA.appendChild(rowB);
        }
      }
    }
  },

  // (G) SHOW EVENT FORM
  show: id => {
    if (id) {
      cal.hfID.value = id;


      cal.hfStart.value = cal.events[id]["s"]; //Start Time
      cal.hfEnd.value = cal.events[id]["e"]; //End Time
      cal.hfStatus.value = cal.events[id]["status"]; // STATUS

      if (cal.hfType.value = cal.events[id]["type"] === "ADMIN") { // For Admin Viewing of requestor's full name
        cal.hfRequestor.value = cal.events[id]["fullName"]; //Requestor's Name
      }
      if (cal.hfType.value = cal.events[id]["type"] === "VIEWER") { // For Viewer Viewing of requestor's full name
        cal.hfRequestor.value = cal.events[id]["fullName"]; //Requestor's Name
      }
      if (cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"] && cal.events[id]["category"] === "USER") {
        cal.hfRequestor.value = cal.events[id]["firstname"] + " " + cal.events[id]["lastname"]; //Requestor's Name
      }

      if (cal.events[id]["user_id"] === cal.events[id]["user_id_session"] &&
        cal.events[id]["name"] === cal.events[id]["name"] &&
        cal.events[id]["type"] === "USER" &&
        cal.events[id]["app_status"] === "PENDING") {
        cal.hfSave.style.display = "inline-block";
        cal.hfDel.style.display = "inline-block";

      } else if (cal.events[id]["user_id"] === cal.events[id]["user_id_session"] &&
        cal.events[id]["name"] === cal.events[id]["name"] &&
        cal.events[id]["type"] === "USER" &&
        cal.events[id]["status"] === "APPROVED" ||
        cal.events[id]["status"] === "REJECTED" ||
        cal.events[id]["status"] === "") {
        cal.hfSave.style.display = "none";
        cal.hfDel.style.display = "none";
      }





    } else {
      cal.hForm.reset();
      cal.hfID.value = "";
      cal.hfDel.style.display = "none";
      cal.hfCancel.style.display = "none";
    }
    cal.hFormWrap.show();
  },


  // (H) SAVE EVENT
  save: () => {
    // (H1) COLLECT DATA
    var data = {
      req: "save",
      status: cal.hfStatus.value
    };
    if (cal.hfID.value != "") {
      data.id = cal.hfID.value;
    }

    // (H2) Create a confirmation SweetAlert dialog
    Swal.fire({
      title: 'Confirm Save',
      text: 'Are you sure you want to approve this Appointment?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        // User confirmed the save action
        // (H3) AJAX SAVE
        cal.ajax(data, res => {
          if (res == "OK") {
            Swal.fire(
              'Saved!',
              'Successfully Approved.',
              'success'
            ).then(() => {
              cal.hFormWrap.close();

              // (H4) Wait for cal.load() to complete before redirecting
              cal.load(() => {
                setTimeout(() => {
                  window.location.href = 'pre_hospital_care_report.php';
                }, 100);
              });
            });
          } else {
            Swal.fire(
              'Error',
              res,
              'error',
            );
          }
        });
      }
    });
    return false;
  },
  
  // (I) DELETE EVENT
  del: () => {
    var data = {
      req: "del",
      status: cal.hfStatus.value
    };
    if (cal.hfID.value != "") {
      data.id = cal.hfID.value;
    }

    // Display a SweetAlert confirmation dialog with custom size
    Swal.fire({
      title: 'Are you sure?',
      text: 'You won\'t be able to revert this!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, reject it!',
      cancelButtonText: 'Cancel' // Apply custom CSS class
    }).then((result) => {
      if (result.isConfirmed) {
        // User clicked the "Yes, delete it!" button
        cal.ajax(data, res => {
          console.log("Response", data);
          if (res === "OK") {
            Swal.fire(
              'Saved!',
              'Successfully Rejected.',
              'success'
            ).then(() => {
              cal.hFormWrap.close();
              cal.load();
            });
          } else {
            Swal.fire(
              'Error',
              res,
              'error'
            );
          }
        });
      }
    });

    return false;
  }

};
window.onload = cal.init;