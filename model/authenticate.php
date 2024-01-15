<?php
class User
{
    private $connect;
    public $username;
    public $password;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    // FOR LOGIN
    public function login()
    {
        $query = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $this->username);

        $stmt->execute();
        return $stmt;
    }

    // FOR SIGNUP
    public function signup($id, $firstname, $middlename, $lastname, $email, $contact_number, $division, $username, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user(pcn_id_number, firstname, middlename, lastname, email, contact_number, division, username, password) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $firstname);
        $stmt->bindParam(3, $middlename);
        $stmt->bindParam(4, $lastname);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $contact_number);
        $stmt->bindParam(7, $division);
        $stmt->bindParam(8, $username);
        $stmt->bindParam(9, $hashed_password);
        // $stmt->bindParam(9, $password);

        $stmt->execute();
        return $stmt;
    }

    // FOR SET APPOINTMENT DATE
    public function appoint_date($user_id, $start_date, $end_date, $name, $type)
    {
        $query = "INSERT INTO appointment(user_id, appointment_date_start, appointment_date_end, name, type) VALUES (? ,?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $start_date);
        $stmt->bindParam(3, $end_date);
        $stmt->bindParam(4, $name);
        $stmt->bindParam(5, $type);
        $stmt->execute();
        return $stmt;
    }

    // SELECT 
    public function select_data()
    {
        $query = "SELECT * FROM appointment";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function select_datas()
    {
        $query = "SELECT * FROM pre_hospital_info";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function select_datas2($id)
    {
        $query = "SELECT * FROM pre_hospital_info WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt;
    }

    public function select_datas3($id)
    {
        $query = "SELECT * FROM profile1 WHERE emp_id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt;
    }



    public function select_profile()
    {
        $query = "SELECT * FROM emp  WHERE track='' order by LAST_NAME asc";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }





    public function select_profile2($id)
    {
        $query = "SELECT * FROM emp WHERE id = ? ";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt;
    }


    public function select_profile3()
    {
        $query = "SELECT * FROM profile1  order by profile_name asc";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }



    public function select_profile4($id)
    {
        $query = "SELECT * FROM emp WHERE id = ? ";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt;
    }


    public function select_profile5($id)
    {
        $query = "SELECT * FROM profile1 WHERE emp_id = ? ";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt;
    }


    public function select_profile6($id)
    {
        $query = "SELECT * FROM vitals WHERE info_id = ? ";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt;
    }



    public function select_bd1()
    {
        $query = "SELECT * FROM emp WHERE is_deleted = '0'";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function tubercolosis_yes(){
        $sql = "SELECT COUNT(tubercolosis) FROM `profile1` WHERE tubercolosis = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function tubercolosis_no(){
        $sql = "SELECT COUNT(tubercolosis) FROM `profile1` WHERE tubercolosis = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }


    public function hypertension_yes(){
        $sql = "SELECT COUNT(hypertension) FROM `profile1` WHERE hypertension = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function hypertension_no(){
        $sql = "SELECT COUNT(hypertension) FROM `profile1` WHERE hypertension = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function diabetes_mellittus_yes(){
        $sql = "SELECT COUNT(diabetes_mellittus) FROM `profile1` WHERE diabetes_mellittus = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function diabetes_mellittus_no(){
        $sql = "SELECT COUNT(diabetes_mellittus) FROM `profile1` WHERE diabetes_mellittus = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function heart_trouble_yes(){
        $sql = "SELECT COUNT(heart_trouble) FROM `profile1` WHERE heart_trouble = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function heart_trouble_no(){
        $sql = "SELECT COUNT(heart_trouble) FROM `profile1` WHERE heart_trouble = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function endocrine_diseases_yes(){
        $sql = "SELECT COUNT(endocrine_diseases) FROM `profile1` WHERE endocrine_diseases = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function endocrine_diseases_no(){
        $sql = "SELECT COUNT(endocrine_diseases) FROM `profile1` WHERE endocrine_diseases = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function cancer_tumor_yes(){
        $sql = "SELECT COUNT(cancer_tumor) FROM `profile1` WHERE cancer_tumor = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function cancer_tumor_no(){
        $sql = "SELECT COUNT(cancer_tumor) FROM `profile1` WHERE cancer_tumor = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function mental_disorder_yes(){
        $sql = "SELECT COUNT(mental_disorder) FROM `profile1` WHERE mental_disorder = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function mental_disorder_no(){
        $sql = "SELECT COUNT(mental_disorder) FROM `profile1` WHERE mental_disorder = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function frequent_headache_yes(){
        $sql = "SELECT COUNT(frequent_headache) FROM `profile1` WHERE frequent_headache = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function frequent_headache_no(){
        $sql = "SELECT COUNT(frequent_headache) FROM `profile1` WHERE frequent_headache = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function chronic_cough_yes(){
        $sql = "SELECT COUNT(chronic_cough) FROM `profile1` WHERE chronic_cough = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function chronic_cough_no(){
        $sql = "SELECT COUNT(chronic_cough) FROM `profile1` WHERE chronic_cough = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function std_yes(){
        $sql = "SELECT COUNT(std) FROM `profile1` WHERE std = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function std_no(){
        $sql = "SELECT COUNT(std) FROM `profile1` WHERE std = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function hepa_a_yes(){
        $sql = "SELECT COUNT(hepa_a) FROM `profile1` WHERE hepa_a = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function hepa_a_no(){
        $sql = "SELECT COUNT(hepa_a) FROM `profile1` WHERE hepa_a = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function hepa_b_yes(){
        $sql = "SELECT COUNT(hepa_b) FROM `profile1` WHERE hepa_b = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function hepa_b_no(){
        $sql = "SELECT COUNT(hepa_b) FROM `profile1` WHERE hepa_b = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function aids_hiv_yes(){
        $sql = "SELECT COUNT(aids_hiv) FROM `profile1` WHERE aids_hiv = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function aids_hiv_no(){
        $sql = "SELECT COUNT(aids_hiv) FROM `profile1` WHERE aids_hiv = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function covid19_yes(){
        $sql = "SELECT COUNT(covid19) FROM `profile1` WHERE covid19 = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function covid19_no(){
        $sql = "SELECT COUNT(covid19) FROM `profile1` WHERE covid19 = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function asthma_yes(){
        $sql = "SELECT COUNT(asthma) FROM `profile1` WHERE asthma = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function asthma_no(){
        $sql = "SELECT COUNT(asthma) FROM `profile1` WHERE asthma = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function rheumatism_yes(){
        $sql = "SELECT COUNT(rheumatism) FROM `profile1` WHERE rheumatism = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function rheumatism_no(){
        $sql = "SELECT COUNT(rheumatism) FROM `profile1` WHERE rheumatism = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function physical_injury_yes(){
        $sql = "SELECT COUNT(physical_injury) FROM `profile1` WHERE physical_injury = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function physical_injury_no(){
        $sql = "SELECT COUNT(physical_injury) FROM `profile1` WHERE physical_injury = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function hernia_yes(){
        $sql = "SELECT COUNT(hernia) FROM `profile1` WHERE hernia = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function hernia_no(){
        $sql = "SELECT COUNT(hernia) FROM `profile1` WHERE hernia = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function typhoid_yes(){
        $sql = "SELECT COUNT(typhoid) FROM `profile1` WHERE typhoid = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function typhoid_no(){
        $sql = "SELECT COUNT(typhoid) FROM `profile1` WHERE typhoid = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function stomach_abdomina_yes(){
        $sql = "SELECT COUNT(stomach_abdomina) FROM `profile1` WHERE stomach_abdomina = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function stomach_abdomina_no(){
        $sql = "SELECT COUNT(stomach_abdomina) FROM `profile1` WHERE stomach_abdomina = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function kidney_bladder_yes(){
        $sql = "SELECT COUNT(kidney_bladder) FROM `profile1` WHERE kidney_bladder = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function kidney_bladder_no(){
        $sql = "SELECT COUNT(kidney_bladder) FROM `profile1` WHERE kidney_bladder = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function dizziness_yes(){
        $sql = "SELECT COUNT(dizziness) FROM `profile1` WHERE dizziness = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function dizziness_no(){
        $sql = "SELECT COUNT(dizziness) FROM `profile1` WHERE dizziness = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function allergies_yes(){
        $sql = "SELECT COUNT(allergies) FROM `profile1` WHERE allergies = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function allergies_no(){
        $sql = "SELECT COUNT(allergies) FROM `profile1` WHERE allergies = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function others_yes(){
        $sql = "SELECT COUNT(othersv) FROM `profile1` WHERE othersv = 'YES'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    
    public function others_no(){
        $sql = "SELECT COUNT(othersv) FROM `profile1` WHERE othersv = 'NO'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function blood_pressure(){
        $sql = "SELECT COUNT(blood_presure) FROM `profile1`";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }

    public function bmi(){
        $sql = "SELECT COUNT(bmi) FROM `profile1`";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();
        return $rowCount;
    }
    public function vitals_detail($vitals){
        $data = "";
        $sql = "SELECT * FROM `profile1` WHERE $vitals != :data";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
        
        return $stmt;
    }
    public function vitals_detail_division($vitals, $division){
        $sql = "SELECT * FROM `profile1` WHERE $vitals != :data AND profile_division = :division";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':data', $vitals);
        $stmt->bindParam(':division', $division);
        $stmt->execute();
        
        return $stmt;
    }

    public function illness_detail($columnName, $status){
        $sql = "SELECT * FROM `profile1` WHERE $columnName = :value";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':value', $status);
        $stmt->execute();
        
        return $stmt;
    }

    public function illness_detail_division($columnName, $status, $division){
        $sql = "SELECT * FROM `profile1` WHERE $columnName = :value AND profile_division = :division";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':value', $status);
        $stmt->bindParam(':division', $division);
        $stmt->execute();
        
        return $stmt;
    }

    public function print_vitals($patient_name){
        $sql = "SELECT * FROM vitals WHERE patient_name = :patient_name";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':patient_name', $patient_name);
        $stmt->execute();
        
        return $stmt;
    }
}
