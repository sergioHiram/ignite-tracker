
<?php

require("../functions/db.php");
session_start();
$UserId = f_c($_SESSION['Id'],'d');
$sql = "SELECT * FROM IU WHERE Id = '{$UserId}'";
$result = query($sql);
$row = fetch_array($result);
$Name = f_c($row['N'],'d');

?>

<div class="row justify-content-center">
  <div class="col-8">
    <div class="card shadow" style="border:0!important;">
      <div class="card-header" style="padding:0;background-image: url('https://atos.net/wp-content/uploads/2020/03/ignite-banner.jpg'); background-size: cover; height: 150px; ">
        <h4 style="color:#FFF;font-weight:bold;text-align:center;margin-top:55px;"><span class="align-middle"><?php echo $Name; ?></span></h4>
      </div>
      <div class="card-body">
        <form id="formTracking">
          <div class="form-group">
            <label for="">Type of training:</label>
            <select class="form-control form-control-lg" name="Type_of_Training" id="Type_of_Training">
              <option selected disabled>Select an option:</option>
              <option value="Technical">Technical</option>
              <option value="Practical">Practical</option>
              <option value="SoftSkill">Soft Skill</option>
              <option value="Atos">Atos Training</option>
              <option value="Project">Project</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <!-- Start Technical Options -->
          <div class="form-group options123" id="TechnicalOptionsView" style="display:none;">
            <label for="">Select one of the technical trainings</label>
            <select class="form-control form-control-lg" name="TechnicalOptions" id="TechnicalOptions">
              <option selected disabled>Select an option</option>
              <optgroup label="Cloud Concepts">
                <option value="Cloud_computing_basics">Cloud computing basics (percipio)</option>
                <option value="Cloud_Basics">Cloud Basics</option>
              </optgroup>
              <optgroup label="Google Essentials">
                <option value="Google_Essentials">Google Essentials</option>
              </optgroup>
              <optgroup label="AWS Essentials">
                <option value="AWS_Essentials">AWS Essentials</option>
              </optgroup>
              <optgroup label="Azure Essentials">
                <option value="Azure_Essentials">Azure Essentials</option>
              </optgroup>
              <optgroup label="SOA and Microservices">
                <option value="Microservices_Containers">Microservices Containers</option>
                <option value="Microservices_Architecture">Microservices Architecture</option>
                <option value="SOA_Basics">SOA Basics</option>
                <option value="SOA_Governance">SOA_Governance</option>
                <option value="Core_Concepts_of_SOA">Core Concepts of SOA</option>
                <option value="JSON_Essentials">JSON Essentials</option>
                <option value="REST_API_with_Java_Java_APIs_with_JSON_Maven_and_Spring">REST API with Java: Java APIs with JSON, Maven & Spring</option>
                <option value="Working_with_JSON_Java_Node.is_and_Python">Working with JSON, Java, Node.is & Python</option>
                <option value="YAML_Essentials">YAML Essentials</option>
                <option value="Evaluation_SOA_and_Microservices">Evaluation SOA and Microservices</option>
              </optgroup>
              <optgroup label="DevOps, Agile and JIRA">
                <option value="Secure_Agile_Programming_Agile_Concepts">Secure Agile Programming: Agile Concepts</option>
                <option value="Agile_Methodologies">Agile Methodologies </option>
                <option value="Agile_Principles_and_Methodologies">Agile Principles & Methodologies</option>
                <option value="Linux_Operating_System_Fundamentals">Linux Operating System Fundamentals</option>
                <option value="JIRA">JIRA</option>
                <option value="DevOps_Essentials">DevOps Essentials</option>
                <option value="DevOps-eLearning">DevOps - eLearning</option>
                <option value="Beginners_guide_to_containers_and_orchestration">Beginners guide to containers and orchestration</option>
                <option value="Serverless_Concepts">Serverless Concepts</option>
                <option value="Docker_Machine_and_Security">Docker Machine and Security</option>
                <option value="Evaluation">Evaluation</option>
                <option value="Docker_Machine_APIs_and_VMs">Docker Machine APIs & VMs</option>
              </optgroup>
              <optgroup label="CICSD,  GIT HUB, Jenjins, Docker, Kubernetes">
                <option value="Git_Quick_Start">Git Quick Start</option>
                <option value="Hands-On_GitOps">Hands-On GitOps</option>
                <option value="Jenkins_Quick_Start">Jenkins Quick Start</option>
                <option value="Docker_Quick_Start">Docker Quick Start</option>
                <option value="Kubernetes_Quick_Start">Kubernetes Quick Start</option>
                <option value="Implementing_a_full_CI_CD_Pipeline">Implementing a full CI/CD Pipeline</option>
                <option value="CI_CD_Implementation_for_DevOps">CI/CD Implementation for DevOps</option>
                <option value="Docker_Machine_and_Security">Docker Machine & Security</option>
                <option value="Evaluation_CICSD_GITHUB_Jenjins_Docker_Kubernetes">Evaluation CICSD,  GIT HUB, Jenjins, Docker, Kubernetes</option>
              </optgroup>
              <optgroup label="Testing and Database">
                <option value="Software_Testing">Software Testing</option>
                <option value="Database_Essentials">Database Essentials</option>
                <option value="Evaluation_Testing_and_Database">Evaluation Testing and Database</option>
              </optgroup>
              <optgroup label="Python">
                <option value="Introduction_to_Python_Development">Introduction to Python Development</option>
                <option value="Practice_Module_Introduction_to_Python_Development">Practice Module Introduction to Python Development</option>
                <option value="Introduction_to_Python_Development">Introduction to Python Development</option>
                <option value="Practice_Module_Introduction_to_Python_Development">Practice Module Introduction to Python Development</option>
                <option value="Customer_Focus_part_1">Customer Focus (part 1)</option>
                <option value="Customer_Focus_part_2">Customer Focus (part 2)</option>
                <option value="Practice_Session_Python">Practice Session Python</option>
                <option value="Evaluation_Python">Evaluation</option>
              </optgroup>
              <optgroup label="Data Visualization">
                <option value="Data_Visualisation_Core_Concepts">Data Visualization Core Concepts</option>
                <option value="Power_BI-Getting_started_with_data_analytics">Power BI - Getting started with data analytics</option>
                <option value="Power_BI-Data_Modelling_and_Visualisation">Power BI - Data Modelling & Visualization</option>
                <option value="Power_BI-Data_Preparation">Power_BI-Data_Preparation</option>
                <option value="QlikView_Getting_Started">QlikView: Getting Started</option>
                <option value="QlikView_Sheets_Charts_and_Tables">QlikView: Sheets, Charts & Tables</option>
                <option value="QlikView_Data_Modelling">QlikView: Data Modelling</option>
                <option value="QlikView_Dimensional_Modelling">QlikView: Dimensional Modelling</option>
                <option value="Storytelling_with_Data_Introduction">Storytelling with Data: Introduction</option>
                <option value="Storytelling_with_Data_Tableau_and_Powerbase">Storytelling with Data: Tableau & Powerbase</option>
                <option value="Evaluation_Data_Visualization">Evaluation Data Visualization</option>
              </optgroup>
              <optgroup label="Machine Learning">
                <option value="Machine_and_Deep_Learning_Algorithms_Introduction">Machine & Deep Learning Algorithms: Introduction</option>
                <option value="Machine_and_Deep_Learning_Algorithms_Regression_and_Clustering">Machine & Deep Learning Algorithms: Regression & Clustering</option>
                <option value="Machine_and_DeepLearning_Algorithms_Data_Preparation_in_Pandas_ML">Machine & Deep Learning Algorithms: Data Preparation in Pandas ML</option>
                <option value="ML_DL_in_the_Enterprise_Modelling_Development_and_Deployment">ML/DL in the Enterprise: Modelling, Development & Deployment</option>
                <option value="Model_Management_Building_and_Deploying_ML_Models_in_Production">Model Management: Building & Deploying ML Models in Production</option>
                <option value="Machine_Learning_and_Data_Analytics">Machine Learning & Data Analytics</option>
                <option value="Machine_Learning_Implementation">Machine Learning Implementation</option>
                <option value="Math_for_Data_Science_and_Machine_Learning">Math for Data Science & Machine Learning</option>
                <option value="Improving_Neural_Networks_Neural_Network_Performance_Management">Improving Neural Networks: Neural Network Performance Management</option>
                <option value="NLP_for_ML_with_Python_NLP_Using_Python_and_NLTK">NLP for ML with Python: NLP Using Python & NLTK</option>
                <option value="TensorFlow_Deep_Neural_Networks_and_Image_Classification_Using_Estimators">TensorFlow: Deep Neural Networks & Image Classification Using Estimators</option>
                <option value="Improving_Neural_Networks_Data_Scaling_and_Regularization">Improving Neural Networks: Data Scaling & Regularization</option>
                <option value="Using_Python_ML_for_Predicative_Analytics">Using Python ML for Predicative Analytics</option>
                <option value="Evaluation_Machine_Learning">Evaluation Machine Learning</option>
              </optgroup>
              <optgroup label="Big Data Fundamentals">
                <option value="Bid_Data_Fundamentals">Bid Data Fundamentals</option>
                <option value="Hadoop_Quick_Start">Hadoop Quick Start</option>
                <option value="Big_Data_Essentials">Big Data Essentials</option>
                <option value="Apache_Hadoop">Apache Hadoop</option>
                <option value="Deploy_and_Configure_a_Single-Node_Hadoop_Cluster">Deploy & Configure a Single-Node Hadoop Cluster</option>
                <option value="Hadoop_and_MapReduce_Getting_Started">Hadoop & MapReduce Getting Started</option>
                <option value="Data_Warehousing">Data Warehousing</option>
                <option value="Evaluation_Big_Data_Fundamentals">Evaluation Big Data Fundamentals</option>
              </optgroup>
              <optgroup label="Security">
                <option value="Cloud_Security_Fundamentals">Cloud Security Fundamentals</option>
                <option value="Microsoft_Azure_Security_Fundamentals">Microsoft Azure Security Fundamentals </option>
                <option value="Server_Hardening_Fundamentals">Server Hardening Fundamentals</option>
                <option value="Compliance_in_the_Cloud_Fundamentals">Compliance in the Cloud Fundamentals</option>
                <option value="Secure_Sockets_Layer_SSL_Fundamentals">Secure Sockets Layer (SSL) Fundamentals</option>
                <option value="Encryption_Fundamentals">Encryption Fundamentals</option>
                <option value="Evaluation Security">Evaluation</option>
              </optgroup>
            </select>
          </div>
          <!-- END Technical Options -->

          <!-- Start Practical Options -->
          <div class="form-group options123" id="PracticalOptionsView" style="display:none;">
            <label for="">Select one of the Practical trainings</label>
            <select class="form-control form-control-lg" name="PracticalOptions" id="PracticalOptions">
              <option selected disabled>Select an option</option>
              <option value="Practice_assignment_1">Practice assignment 1</option>
              <option value="Practice_assignment_2">Practice assignment 2</option>
              <option value="Practice_assignment_3">Practice assignment 3</option>
              <option value="Practice_assignment_4">Practice assignment 4</option>
              <option value="Practice_assignment_5">Practice assignment 5</option>
              <option value="Practice_assignment_6">Practice assignment 6</option>
              <option value="Lab_customer_scenario">Lab / customer scenario</option>
              <option value="Google_lab">Google lab</option>
              <option value="Practice_assignment_7">Practice assignment 7</option>
              <option value="Practice_assignment_8">Practice assignment 8</option>
              <option value="Practice_assignment_9">Practice assignment 9</option>
              <option value="Practice_assignment_10">Practice assignment 10</option>
              <option value="Practice_assignment_11">Practice assignment 11</option>
              <option value="Practice_assignment_12">Practice assignment 12</option>
              <option value="Practice_assignment_13">Practice assignment 13</option>
              <option value="Practice_assignment_14">Practice assignment 14</option>
              <option value="Practice_assignment_15">Practice assignment 15</option>
              <option value="Practice_assignment_16">Practice assignment 16</option>
              <option value="Practice_assignment_17">Practice assignment 17</option>
              <option value="Practice_assignment_18">Practice assignment 18</option>
              <option value="Practice_assignment_19">Practice assignment 19</option>
              <option value="Practice_assignment_20">Practice assignment 20</option>
              <option value="Practice_assignment_21">Practice assignment 21</option>
            </select>
          </div>
          <!-- END Practical Options -->

          <!-- Start SoftSkill Options -->
          <div class="form-group options123" id="SoftSkillsOptionsView" style="display:none;">
            <label for="">Select one of the SoftSkills trainings</label>
            <select class="form-control form-control-lg" name="SoftSkillsOptions" id="SoftSkillsOptions">
              <option selected disabled>Select an option</option>
              <option value="Compliance_training">Compliance training (self paced)</option>
              <option value="Joining_the_corporate_world">Joining the corporate world</option>
              <option value="Social_Media">Social Media</option>
              <option value="Dress_code">Dress code</option>
              <option value="Role_model">Role model</option>
              <option value="Ambassador_for_Atos">Ambassador for Atos</option>
              <option value="Complete_SDI_profile">Complete profile</option>
              <option value="Harvard_Customer_Focus">Harvard Customer Focus</option>
              <option value="Harvard_Networking">Harvard Networking</option>
              <option value="Networking_challenge">Networking challenge</option>
              <option value="Mentoring_1_1_sessions">Mentoring 1:1 sessions</option>
              <option value="Harvard_Global_Collaboration">Harvard Global Collaboration</option>
              <option value="Team_building">Team building</option>
              <option value="Coaching_and_SDI">Coaching & SDI</option>
              <option value="Harvard_Team_Work">Harvard Team Work</option>
              <option value="Unconcious_bias">Unconcious bias</option>
              <option value="Harvard_Diversity">Harvard Diversity</option>
              <option value="Harvard_Presentation_skills">Harvard Presentation skills</option>
              <option value="Objective_Setting">Objective Setting</option>
              <option value="Performance_Management">Performance Management</option>
              <option value="Harvard_Innovation_and_Creativity">Harvard Innovation & Creativity</option>
              <option value="Service_Orientation">Service Orientation</option>
              <option value="Customer_case_study">Customer case study</option>
              <option value="Championing_digital_transformation">Championing digital transformation</option>
              <option value="Invest_in_Yourself">Invest in Yourself</option>
              <option value="Problem_Solving">Problem Solving</option>
              <option value="Problem_Statement">Problem Statement</option>
            </select>
          </div>
          <!-- END SoftSkill Options -->

          <!-- Start Atos Options -->
          <div class="form-group options123" id="AtosOptionsView" style="display:none;">
            <label for="">Select one of the Atos trainings</label>
            <select class="form-control form-control-lg" name="AtosOptions" id="AtosOptions">
              <option selected disabled>Select an option</option>
              <option value="Set_up_equipment_ID_badge_etc">Set up equipment, ID badge etc</option>
              <option value="Corporate-Program_Induction">Corporate/Program Induction</option>
              <option value="Local_Induction">Local Induction</option>
              <option value="Introduction_to_Atos_TOM">Introduction to Atos TOM</option>
              <option value="Intro_to_CES">Intro to CES</option>
              <option value="How_to_use_Linux">How to use Linux</option>
              <option value="We_are_Atos_intro">We are Atos intro</option>
              <option value="Customer_Centricity">Customer Centricity</option>
              <option value="CES Marketing-Client_Engagement">CES Marketing & Client Engagement</option>
              <option value="Customer_case_studies">Customer Case Studies</option>
              <option value="Customer_case_BTIC">Customer case (BTIC)</option>
              <option value="Introduction_Strategic_Partners">Introduction Strategic Partners</option>
              <option value="Google_Alliance">Google Alliance</option>
              <option value="AWS_Alliance">AWS Alliance</option>
              <option value="Partner-Alliance_challenge">Partner/Alliance challenge?</option>
              <option value="Introduction_GDC">Introduction GDC</option>
              <option value="Introduction_TMT">Introduction TMT</option>
              <option value="We_are_Atos-social_value">We are Atos - social value</option>
              <option value="Introduction_FS_I">Introduction FS&I</option>
              <option value="Meet_graduates_from_different_offices_around_the_world">Meet graduates from different offices around the world</option>
              <option value="NOC_SOC_Datacenter_visit">NOC / SOC / Datacenter visit?</option>
              <option value="Introduction_H_LS">Introduction H&LS</option>
              <option value="RBU_leader_Q_A_session">RBU leader Q&A session</option>
              <option value="Introduction_R_S">Introduction R&S</option>
              <option value="Meet_an_Agile_Squad-UK-Kavi-best_practice">Meet an Agile Squad - UK/Kavi/ best practice ?</option>
              <option value="Present_your_squad_and_their_ability">Present your squad and their ability</option>
              <option value="We_are_Diverse_DRL">We are Diverse (DRL)</option>
              <option value="Unconcious_Bias_in_AI">Unconcious Bias in AI</option>
              <option value="Intro_to_Sales_in_Atos-CES">Intro to Sales in Atos/CES</option>
              <option value="Sales_Pitch_Atos">Sales Pitch Atos</option>
              <option value="Sales_Techniques">Sales Techniques</option>
              <option value="Pitch_club-sales_competition">Pitch club/ sales competition</option>
              <option value="Digital_Platforms">Digital Platforms</option>
              <option value="Intro_to_Scientific_Community">Intro to Scientific Community</option>
              <option value="Business_Critical_Apps">*Business Critical Apps</option>
              <option value="Innovation_booster">Innovation booster</option>
              <option value="UX">UX</option>
              <option value="Customer_visit">Customer visit</option>
              <option value="Machine_learning_for_sustainability">Machine learning for sustainability</option>
              <option value="The_Olympics_evolution">The Olympics evolution</option>
              <option value="Tokyo_best_practises-facial_recognition_etc">Tokyo best practises (facial recognition etc.)</option>
              <option value="Predicative_Analytics_at_Disney">Predicative Analytics at Disney</option>
              <option value="Assesment_portfolio_knowledge">Assesment portfolio knowledge</option>
              <option value="Deep_dive_on_BDS-zData">Deep dive on BDS/zData?</option>
              <option value="Technologies_trends_and_perspectives">Technologies, trends and perspectives</option>
              <option value="Quantum_Computing">Quantum Computing</option>
              <option value="Decarbonation">Decarbonation</option>
              <option value="Atos_IT_Challenge">Atos IT Challenge</option>
            </select>
          </div>
          <!-- END Atos Options -->

          <!-- Start Project Options -->
          <div class="form-group options123" id="ProjectOptionsView" style="display:none;">
            <label for="">Select one of the Project activities</label>
            <select class="form-control form-control-lg" name="ProjectOptions" id="ProjectOptions">
              <option selected disabled>Select an option</option>
              <option value="CSR_Challenge_Intro/Prep">CSR Challenge Intro/Prep</option>
            </select>
          </div>
          <!-- END Project Options -->

          <!-- Start Other Options -->
          <div class="form-group options123" id="OtherOptionsView" style="display:none;">
            <label for="">Select one of the Project activities</label>
            <select class="form-control form-control-lg" name="OtherOptions" id="OtherOptions">
              <option selected disabled>Select an option</option>
              <option value="Squad_team_introduction">Squad team introduction</option>
              <option value="FUN_integration_1">FUN integration</option>
              <option value="Vlog_on_local_office_life">Vlog on local office life</option>
              <option value="Cohort_Collaboration">Cohort Collaboration</option>
              <option value="FUN_integration_2">FUN integration 2</option>
              <option value="CSR_Activity">CSR Activity</option>
              <option value="FUN_Olympic_Hackathon_scenarios_challenges">FUN - Olympic Hackathon, scenarios - challenges</option>
              <option value="Assessment_SignOff">Assessment & Sign Off - Passing First Milestone of Cloud Fundamentals</option>
            </select>
          </div>
          <!-- END Other Options -->

          <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg" id="confirmation">Save your advance</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="confirmationModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-body">
        <h3 style="text-align:center;">Are you sure you want to save? </h3>
        <br>
        <div class="row justify-content-center">
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-block" id="Save">YES</button>
          </div>
          <div class="col-4">
            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">NO</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">

  $("#confirmation").click(function(){
    var Type_of_Training_Confirm = $("#Type_of_Training").val()

    if (Type_of_Training_Confirm == "Technical") {
      var Training_Name_Confirm = $("#TechnicalOptions").val()
    }else if (Type_of_Training_Confirm == "Practical") {
      var Training_Name_Confirm = $("#PracticalOptions").val()
    }else if (Type_of_Training_Confirm == "SoftSkill") {
      var Training_Name_Confirm = $("#SoftSkillsOptions").val()
    }else if (Type_of_Training_Confirm == "Atos") {
      var Training_Name_Confirm = $("#AtosOptions").val()
    }else if (Type_of_Training_Confirm == "Project") {
      var Training_Name_Confirm = $("#ProjectOptions").val()
    }else if (Type_of_Training_Confirm == "Other") {
      var Training_Name_Confirm = $("#OtherOptions").val()
    }

    if ((Type_of_Training_Confirm != null) && (Training_Name_Confirm != null)) {
      $("#confirmationModal").modal("toggle")
    }else {
      swal("ERROR!", "You need to complete all the fields", "error")
    }

    return false
  })

  $("#Type_of_Training").change(function () {
    $(".options123").hide()
    var Type_of_Training_View = $("#Type_of_Training").val()
    if (Type_of_Training_View == "Technical") {
      $("#TechnicalOptionsView").show()
    }else if (Type_of_Training_View == "Practical") {
      $("#PracticalOptionsView").show()
    }else if (Type_of_Training_View == "SoftSkill") {
      $("#SoftSkillsOptionsView").show()
    }else if (Type_of_Training_View == "Atos") {
      $("#AtosOptionsView").show()
    }else if (Type_of_Training_View == "Project") {
      $("#ProjectOptionsView").show()
    }else if (Type_of_Training_View == "Other") {
      $("#OtherOptionsView").show()
    }
  })

  $("#Save").click(function(){
    $("#Save").attr("disabled",true)
    var Type_of_Training = $("#Type_of_Training").val()

    if (Type_of_Training == "Technical") {
      var Training_Name = $("#TechnicalOptions").val()
    }else if (Type_of_Training == "Practical") {
      var Training_Name = $("#PracticalOptions").val()
    }else if (Type_of_Training == "SoftSkill") {
      var Training_Name = $("#SoftSkillsOptions").val()
    }else if (Type_of_Training == "Atos") {
      var Training_Name = $("#AtosOptions").val()
    }else if (Type_of_Training == "Project") {
      var Training_Name = $("#ProjectOptions").val()
    }else if (Type_of_Training == "Other") {
      var Training_Name = $("#OtherOptions").val()
    }

    if ((Type_of_Training != null) && (Training_Name != null)) {
      $.ajax({
        url: "functions/tracking/save.php",
        type: "POST",
        data: {
          UserId:"<?php echo $UserId; ?>",
          Type_of_Training:Type_of_Training,
          Training_Name:Training_Name
        },
        success: function(response){
          if (response == "success") {
            Swal.fire("Good job!", "Registry saved", "success")
            $("#Save").attr("disabled",false)
            $("#confirmationModal").modal("toggle")
            $("#formTracking").trigger("reset")
            $(".options123").hide()
          }else {
            alert(response)
          }
        }
      })
    }else {
      swal("ERROR!", "You need to complete all the fields", "error");
      $("#Save").attr("disabled",false)
    }

    return false
  })
</script>
