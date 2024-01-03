   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="../assets/vendor/libs/jquery/jquery.js"></script>
   <script src="../assets/vendor/libs/popper/popper.js"></script>
   <script src="../assets/vendor/js/bootstrap.js"></script>
   <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

   <script src="../assets/vendor/js/menu.js"></script>

   <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <!-- endbuild -->

   <!-- Confirmations Dialog Boxes -->
   <script>
      // Date Format
      flatpickr("#myDate", {
         dateFormat: "m-d-Y", // Set the desired date format (MM-DD-YYYY)
         altInput: true, // Enable the alternate input field
         altFormat: "F j, Y", // Set the format for the alternate input field (placeholder)
         placeholder: "Select a date", // Set the text for the placeholder
      });

      $("#X").on("change", function() {
         var x_values = $("#X").find(":selected").val();
         $.ajax({
            url: 'ajaxter.php',
            type: 'POST',
            //dataType:'JSON',
            data: {
               city_code: x_values
            },
            success: function(result) {

               result = JSON.parse(result);

               //Empty option on change
               var select = document.getElementById("Y1");

               var length = select.options.length;

               for (i = length - 1; i >= 0; i--) {
                  select.options[i] = null;
               }
               result.forEach(function(item, index) {
                  var option = document.createElement("option");
                  option.text = item['city_name'];
                  option.value = item['city_name'];
                  var select = document.getElementById("Y1");
                  select.appendChild(option);
               });
            },
            error: function(result) {
               console.log(result)
            }
         });
      });


      $("#X").on("change", function() {

         var x_values = $("#X").find(":selected").val();
         $.ajax({
            url: 'ajaxter1.php',
            type: 'POST',
            //dataType:'JSON',
            data: {
               city_code: x_values
            },
            success: function(result) {
               result = JSON.parse(result);

               //Empty option on change
               var select = document.getElementById("Y2");
               var length = select.options.length;

               for (i = length - 1; i >= 0; i--) {
                  select.options[i] = null;
               }
               result.forEach(function(item, index) {
                  var option = document.createElement("option");
                  option.text = item['city_name1'];
                  option.value = item['city_name1'];
                  var select = document.getElementById("Y2");

                  select.appendChild(option);
               });
            },
            error: function(result) {
               console.log(result)
            }
         });
      });


      $("#Xres").on("change", function() {
         var x_values = $("#Xres").find(":selected").val();
         $.ajax({
            url: 'ajaxter.php',
            type: 'POST',
            //dataType:'JSON',
            data: {
               city_code: x_values
            },
            success: function(result) {

               result = JSON.parse(result);

               //Empty option on change
               var select = document.getElementById("Y1res");
               var length = select.options.length;

               for (i = length - 1; i >= 0; i--) {
                  select.options[i] = null;
               }

               result.forEach(function(item, index) {
                  var option = document.createElement("option");
                  option.text = item['city_name'];
                  option.value = item['city_name'];
                  var select = document.getElementById("Y1res");
                  select.appendChild(option);
               });
            },
            error: function(result) {
               console.log(result)
            }
         });

      });


      $("#Xres").on("change", function() {
         var x_values = $("#Xres").find(":selected").val();
         $.ajax({
            url: 'ajaxter1.php',
            type: 'POST',
            //dataType:'JSON',
            data: {
               city_code: x_values
            },
            success: function(result) {

               result = JSON.parse(result);

               //Empty option on change
               var select = document.getElementById("Y2res");
               var length = select.options.length;

               for (i = length - 1; i >= 0; i--) {
                  select.options[i] = null;
               }
               result.forEach(function(item, index) {
                  var option = document.createElement("option");
                  option.text = item['city_name1'];
                  option.value = item['city_name1'];
                  var select = document.getElementById("Y2res");
                  select.appendChild(option);
               });
            },

            error: function(result) {
               console.log(result)
            }
         });

      });

      //retrenchment
      $("#Xretrench").on("change", function() {

         var x_values = $("#Xretrench").find(":selected").val();

         $.ajax({
            url: 'ajax_retrench.php',
            type: 'POST',
            //dataType:'JSON',
            data: {
               city_code: x_values
            },
            success: function(result) {

               result = JSON.parse(result);
               //Empty option on change
               var select = document.getElementById("Y1retrench");
               var length = select.options.length;

               for (i = length - 1; i >= 0; i--) {
                  select.options[i] = null;
               }
               //end
               result.forEach(function(item, index) {

                  //console.log(item[2]);

                  var option = document.createElement("option");
                  option.text = item['city_name'];
                  option.value = item['city_name'];
                  var select = document.getElementById("Y1retrench");
                  select.appendChild(option);
               });
            },
            error: function(result) {
               console.log(result)
            }
         });

      });


      $("#Xretrench").on("change", function() {

         var x_values = $("#Xretrench").find(":selected").val();

         $.ajax({
            url: 'ajax_retrench1.php',
            type: 'POST',
            //dataType:'JSON',
            data: {
               city_code: x_values
            },
            success: function(result) {

               result = JSON.parse(result);

               //Empty option on change
               var select = document.getElementById("Y2retrench");
               var length = select.options.length;

               for (i = length - 1; i >= 0; i--) {
                  select.options[i] = null;
               }
               //end

               result.forEach(function(item, index) {

                  //console.log(item[2]);

                  var option = document.createElement("option");
                  option.text = item['city_name1'];
                  option.value = item['city_name1'];
                  var select = document.getElementById("Y2retrench");
                  select.appendChild(option);
               });
            },

            error: function(result) {
               console.log(result)
            }
         });

      });

      //float
      $("#Xfloat").on("change", function() {
         var x_values = $("#Xfloat").find(":selected").val();
         $.ajax({
            url: 'ajax_float.php',
            type: 'POST',
            //dataType:'JSON',
            data: {
               city_code: x_values
            },
            success: function(result) {

               result = JSON.parse(result);

               //Empty option on change
               var select = document.getElementById("Y1float");
               var length = select.options.length;

               for (i = length - 1; i >= 0; i--) {
                  select.options[i] = null;
               }
               //end

               result.forEach(function(item, index) {

                  var option = document.createElement("option");
                  option.text = item['city_name'];
                  option.value = item['city_name'];
                  var select = document.getElementById("Y1float");
                  select.appendChild(option);
               });
            },

            error: function(result) {
               console.log(result)
            }
         });

      });


      $("#Xfloat").on("change", function() {

         var x_values = $("#Xfloat").find(":selected").val();

         $.ajax({
            url: 'ajax_float1.php',
            type: 'POST',
            //dataType:'JSON',
            data: {
               city_code: x_values
            },
            success: function(result) {

               result = JSON.parse(result);

               //Empty option on change
               var select = document.getElementById("Y2float");
               var length = select.options.length;

               for (i = length - 1; i >= 0; i--) {
                  select.options[i] = null;
               }
               //end

               result.forEach(function(item, index) {

                  //console.log(item[2]);

                  var option = document.createElement("option");
                  option.text = item['city_name1'];
                  option.value = item['city_name1'];
                  var select = document.getElementById("Y2float");
                  select.appendChild(option);
               });
            },

            error: function(result) {
               console.log(result)
            }
         });

      });
      
      // For Deploying Applicants and Creating LOA
      $(document).ready(function() {
         $('tbody').on('click', '.open-modal', function() {
            var Id = $(this).prev('.deployID').val();
            $('#deployModal').modal('show');

            // load the corresponding question(s) for the clicked row
            $.ajax({
               url: 'set_loa_for_applicants.php',
               type: 'post',
               data: {
                  id: Id
               },
               success: function(response) {
                  $('#deployModal .modal-body').html(response);
               },
               error: function() {
                  alert('Error.');
               }
            });
         });
      });

      // For Deploying Applicants and Creating LOA
      $(document).ready(function() {
         $('tbody').on('click', '.updateDeployOpenModal', function() {
            var Id = $(this).prev('.deployUpdateID').val();
            $('#updateDeployModal').modal('show');

            // load the corresponding question(s) for the clicked row
            $.ajax({
               url: 'update_loa_for_applicants.php',
               type: 'post',
               data: {
                  id: Id
               },
               success: function(response) {
                  $('#updateDeployModal .modal-body').html(response);
               },
               error: function() {
                  alert('Error.');
               }
            });
         });
      });
   </script>

   <!-- Data Table -->
   <script>
      new DataTable('#example');
      new DataTable('#example2');
   </script>

   <!-- Tooltips Enabler -->
   <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
   </script>

   <!-- Vendors JS -->
   <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

   <!-- Main JS -->
   <script src="../assets/js/main.js"></script>

   <!-- Page JS -->
   <script src="../assets/js/dashboards-analytics.js"></script>

   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>