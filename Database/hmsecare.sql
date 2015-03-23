-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2013 at 06:58 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hmsecare`
--
CREATE DATABASE IF NOT EXISTS `hmsecare` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hmsecare`;

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctor`
--

CREATE TABLE IF NOT EXISTS `hms_doctor` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `marital` varchar(1) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  `phno` int(11) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hms_doctor`
--

INSERT INTO `hms_doctor` (`did`, `name`, `dob`, `cnic`, `sex`, `marital`, `pass`, `reg_date`, `phno`) VALUES
(1, 'Nadeem Kurshidi', '2013-11-26', '000000000000', 'm', 'm', 'nadeembhai', '2013-11-26 00:00:00', 0),
(2, 'Abdullah', '2013-11-13', '', 'm', 's', 'OLidT1l', '2013-11-28 10:58:18', NULL),
(3, 'haris', '2013-11-30', '121212', 'm', 's', 'mnrq1FK', '2013-11-30 11:07:34', 12121),
(4, 'haris', '2013-11-30', '121212', 'm', 's', 'mnrq1FK', '2013-11-30 11:07:58', 12121),
(5, 'haris', '2013-11-30', '121212', 'm', 's', 'mnrq1FK', '2013-11-30 11:08:09', 12121);

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctort_address`
--

CREATE TABLE IF NOT EXISTS `hms_doctort_address` (
  `doctor_did` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `system_city_id` int(11) NOT NULL,
  PRIMARY KEY (`doctor_did`,`system_city_id`),
  KEY `fk_hms_doctort_address_hms_doctor1_idx` (`doctor_did`),
  KEY `fk_hms_doctort_address_hms_system_city1_idx` (`system_city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hms_doctort_address`
--

INSERT INTO `hms_doctort_address` (`doctor_did`, `address`, `system_city_id`) VALUES
(5, 'adasdasdas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctor_availability_timing`
--

CREATE TABLE IF NOT EXISTS `hms_doctor_availability_timing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `days` varchar(150) NOT NULL,
  `doctor_speciality_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`doctor_speciality_id`,`doctor_id`),
  KEY `fk_hms_doctor_availability_timing_hms_doctor_speciality1_idx` (`doctor_speciality_id`,`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctor_has_hms_patient`
--

CREATE TABLE IF NOT EXISTS `hms_doctor_has_hms_patient` (
  `doctor_did` int(11) NOT NULL,
  `hms_patient_case_cid` int(11) NOT NULL,
  `appointment_date` datetime NOT NULL,
  PRIMARY KEY (`doctor_did`,`hms_patient_case_cid`),
  KEY `fk_hms_doctor_has_hms_patient_hms_doctor_idx` (`doctor_did`),
  KEY `fk_hms_doctor_has_hms_patient_hms_patient_case1_idx` (`hms_patient_case_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hms_doctor_has_hms_patient`
--

INSERT INTO `hms_doctor_has_hms_patient` (`doctor_did`, `hms_patient_case_cid`, `appointment_date`) VALUES
(1, 1, '2013-12-01 08:24:21'),
(1, 2, '2013-12-04 00:00:00'),
(1, 3, '2013-12-04 00:00:00'),
(2, 1, '2013-12-25 00:00:00'),
(3, 1, '2013-12-12 00:00:00'),
(4, 1, '2013-12-02 00:00:00'),
(4, 2, '2013-12-02 00:00:00'),
(5, 1, '2013-12-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctor_speciality`
--

CREATE TABLE IF NOT EXISTS `hms_doctor_speciality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_did` int(11) NOT NULL,
  `speciality` varchar(100) NOT NULL,
  `experience_in_months` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`doctor_did`),
  KEY `fk_hms_doctor_speciality_hms_doctor1_idx` (`doctor_did`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `hms_doctor_speciality`
--

INSERT INTO `hms_doctor_speciality` (`id`, `doctor_did`, `speciality`, `experience_in_months`) VALUES
(6, 1, 'ENT', NULL),
(7, 1, 'General Surgeon', NULL),
(8, 4, 'Working Engineer', NULL),
(9, 1, 'Nephrologists‎', NULL),
(10, 1, 'Paleopathologists‎', NULL),
(11, 2, 'Plastic surgery', NULL),
(12, 2, 'Urology', NULL),
(13, 3, 'Dermatologists‎', NULL),
(14, 4, 'Military physicians‎ ', NULL),
(15, 4, 'Serologists‎ ', NULL),
(16, 4, 'Immunologists‎', NULL),
(17, 5, 'Internists‎ ', NULL),
(18, 5, 'High-altitude medicine physicians‎', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hms_management`
--

CREATE TABLE IF NOT EXISTS `hms_management` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phno` int(11) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `marital` varchar(1) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  `management_user_level_id` int(11) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `fk_hms_management_hms_management_user_level1_idx` (`management_user_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hms_management`
--

INSERT INTO `hms_management` (`mid`, `name`, `cnic`, `dob`, `phno`, `sex`, `marital`, `pass`, `reg_date`, `management_user_level_id`) VALUES
(1, 'Abdullah', '42501-516246-2', '1993-07-14', 2147483647, 'm', 's', 'abdullah', '2013-11-26 08:08:00', 1),
(2, 'asdadsd', '23232', NULL, 2323332, 'm', 's', 'lTt3Wvi', '2013-11-30 12:14:17', 1),
(3, 'Hasham', '39849348', NULL, 4343443, 'm', 's', '@bdullah', '2013-12-05 19:48:43', 2),
(4, 'Ibtehaj', '39849348', NULL, 4343443, 'm', 's', '@bdullah', '2013-12-05 19:50:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hms_management_address`
--

CREATE TABLE IF NOT EXISTS `hms_management_address` (
  `management_mid` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `system_city_id` int(11) NOT NULL,
  PRIMARY KEY (`management_mid`,`system_city_id`),
  KEY `fk_hms_management_address_hms_management1_idx` (`management_mid`),
  KEY `fk_hms_management_address_hms_system_city1_idx` (`system_city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hms_management_address`
--

INSERT INTO `hms_management_address` (`management_mid`, `address`, `system_city_id`) VALUES
(1, 'B-450 Gulshan-e-Hadeed Phase 2', 1),
(2, '23efsfsdfdffrerwr', 1),
(3, NULL, 1),
(4, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hms_management_user_level`
--

CREATE TABLE IF NOT EXISTS `hms_management_user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '0-admin\n1-appointment bookies \n',
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hms_management_user_level`
--

INSERT INTO `hms_management_user_level` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `hms_nurses`
--

CREATE TABLE IF NOT EXISTS `hms_nurses` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phno` int(11) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `marital` varchar(1) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `hms_nurses`
--

INSERT INTO `hms_nurses` (`nid`, `name`, `cnic`, `dob`, `phno`, `sex`, `marital`, `pass`, `reg_date`) VALUES
(1, 'Uzair', '', NULL, NULL, 'm', 's', 'rc25L4j', '2013-11-28 16:02:10'),
(2, 'ddddddd', '', NULL, NULL, 'm', 's', 'agVTXWs', '2013-11-28 16:05:22'),
(3, 'ddddddd', '', NULL, NULL, 'm', 's', 'Fs5128Q', '2013-11-28 16:06:17'),
(4, 'invitation', '', '2013-11-28', NULL, 'm', 's', 'oz53iFJ', '2013-11-28 16:06:51'),
(5, 'noia', '2232', '2013-11-30', 23232, 'm', 's', '5waN9ZS', '2013-11-30 09:28:21'),
(6, 'bbbbb', '23232', '2013-11-30', 23232, 'm', 's', 'WiCwKDr', '2013-11-30 09:58:34'),
(7, 'bbbbb', '23232', '2013-11-30', 23232, 'm', 's', 'WiCwKDr', '2013-11-30 10:00:32'),
(8, 'bbbbb', '23232', '2013-11-30', 23232, 'm', 's', 'WiCwKDr', '2013-11-30 10:01:11'),
(9, 'bbbbb', '23232', '2013-11-30', 23232, 'm', 's', 'WiCwKDr', '2013-11-30 10:01:33'),
(10, 'bbbbb', '23232', '2013-11-30', 23232, 'm', 's', 'WiCwKDr', '2013-11-30 10:01:52'),
(11, 'bbbbb', '23232', '2013-11-30', 23232, 'm', 's', 'WiCwKDr', '2013-11-30 10:02:26'),
(12, 'bbbbb', '23232', '2013-11-30', 23232, 'm', 's', 'WiCwKDr', '2013-11-30 10:03:01'),
(13, 'Abdullah', '42501982332', '2013-11-29', 242323, 'm', 's', '3jPlTgi', '2013-11-30 10:03:30'),
(14, 'aaa', '', '2013-11-30', NULL, 'm', 's', 'lVaZpWw', '2013-11-30 10:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `hms_nurses_address`
--

CREATE TABLE IF NOT EXISTS `hms_nurses_address` (
  `nurses_nid` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `system_city_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nurses_nid`,`system_city_id`),
  KEY `fk_hms_nurses_address_hms_nurses1_idx` (`nurses_nid`),
  KEY `fk_hms_nurses_address_hms_system_city1_idx` (`system_city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hms_nurses_address`
--

INSERT INTO `hms_nurses_address` (`nurses_nid`, `address`, `system_city_id`) VALUES
(2, 'xczxcc', 1),
(12, NULL, 2),
(13, 'Home\r\n', 3),
(14, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient`
--

CREATE TABLE IF NOT EXISTS `hms_patient` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `phno` int(11) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `marital` varchar(1) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `profile_creator` int(11) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `fk_hms_patient_hms_management1_idx` (`profile_creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `hms_patient`
--

INSERT INTO `hms_patient` (`pid`, `name`, `dob`, `cnic`, `phno`, `sex`, `marital`, `pass`, `profile_creator`, `reg_date`) VALUES
(1, 'Salman Khan', '1950-11-13', 'Null', 0, 'm', 's', 'saloodhakan', 1, '2013-11-26 00:00:00'),
(2, 'asdad', '2013-11-30', '', NULL, 'm', NULL, 'ymnBfvT', 1, '2013-11-28 09:05:17'),
(3, 'Ibtehaj', '2013-11-20', '12121212', 1212221, 'm', NULL, '1aLIHdO', 1, '2013-11-28 09:06:20'),
(4, 'Hasham', '2013-11-11', '420', 0, 'f', 'd', 'b4EdpxF', 1, '2013-11-28 10:13:51'),
(5, 'aaa', '2013-11-30', '2323', 2323, 'm', 's', 'YLV8TCk', 1, '2013-11-30 11:16:55'),
(6, 'aaa', '2013-11-30', '2323', 2323, 'm', 's', 'YLV8TCk', 1, '2013-11-30 11:17:18'),
(7, 'aaa', '2013-11-30', '2323', 2323, 'm', 's', 'YLV8TCk', 1, '2013-11-30 11:17:31'),
(8, 'aaa', '2013-11-30', '2323', 2323, 'm', 's', 'YLV8TCk', 1, '2013-11-30 11:18:02'),
(9, 'adad', '2013-12-01', '23222', 23232, 'm', 's', 'wGLQDkq', 1, '2013-12-01 09:24:05'),
(10, 'sdfsf', '2013-12-30', '3434', 3434, 'm', 's', 'ZB6c9Tb', 4, '2013-12-06 04:14:26'),
(11, 'asdadas', '2013-12-18', '', NULL, 'm', 's', 'hxLUoMK', 4, '2013-12-06 04:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient_address`
--

CREATE TABLE IF NOT EXISTS `hms_patient_address` (
  `address` varchar(255) DEFAULT NULL,
  `patient_pid` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`patient_pid`,`city_id`),
  KEY `fk_hms_patient_address_hms_system_city1_idx` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hms_patient_address`
--

INSERT INTO `hms_patient_address` (`address`, `patient_pid`, `city_id`) VALUES
('Na maloom Cave ma rahta ha Dhakan ', 1, 2),
('adasd', 8, 2),
('asdadasdasdasdad', 9, 1),
('wewerr', 10, 1),
('234', 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient_case`
--

CREATE TABLE IF NOT EXISTS `hms_patient_case` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `hms_patient_pid` int(11) NOT NULL,
  `case_details` text NOT NULL,
  `case_status` tinyint(1) NOT NULL,
  `rec_date` datetime NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `fk_hms_patient_case_hms_patient1_idx` (`hms_patient_pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hms_patient_case`
--

INSERT INTO `hms_patient_case` (`cid`, `hms_patient_pid`, `case_details`, `case_status`, `rec_date`) VALUES
(1, 1, ' Dr. Mathias Lichterfeld (Medicine): A 41-year-old woman with a history of human immunodeficiency virus (HIV) infection was admitted to the hospital because of malaise and chest and abdominal pain.\r\n\r\nThe patient had been well until approximately 2 weeks before presentation, when fatigue and malaise gradually developed. One week before presentation, she was seen in the outpatient clinic at this hospital for routine HIV follow-up. She reported having had unprotected intercourse with a new HIV-positive male partner 1 month earlier and was concerned about sexually transmitted diseases. Physical examination was normal. A complete blood count, measurement of electrolyte levels including calcium, and results of renal-function tests were normal; nucleic acid testing of a urine specimen was negative for Chlamydia trachomatis and Neisseria gonorrhoeae; other laboratory results are shown in Table 1Table 1Laboratory Data.. Immunizations for hepatitis A and B, influenza, pneumococcus, and combined tetanus, diphtheria, and pertussis were administered.\r\n\r\nDuring the next week, an erythematous, nonpruritic, nonpainful rash developed over the patient''s chest and abdomen and then resolved spontaneously within hours. She reported episodes of epigastric and periumbilical abdominal pain, more severe at night, that awakened her from sleep; she had occasional brief, sharp abdominal pain in the right upper quadrant. Nausea occurred intermittently after eating, without alteration in the pain. Approximately 2 days before admission, episodes of right-sided chest pain developed, which increased with hiccups and deep inspiration and lasted up to 12 minutes. On the morning of admission, she awoke with right-sided chest pain that radiated to her left arm. The pain was associated with transient diaphoresis, nausea, and shortness of breath. She came to this hospital for evaluation.\r\n\r\nThe patient reported unintentional weight loss of approximately 5 kg during the previous 2 months and mild constipation during the previous 2 weeks. Eight years before admission, a diagnosis of HIV type 1 (HIV-1) infection was made during an evaluation of wasting, thrush, hair loss, and malaise; she has been receiving treatment with antiretroviral medications since then. Four months before admission, she transferred her care to this hospital, and baseline test results were obtained (Table 1). She also had dyslipidemia, obesity, anxiety, depression, recurrent sinusitis, alcohol and opiate dependence, candidal vaginitis, chronic neuropathy in a glove-and-stocking distribution, gastroesophageal reflux disease, a history of herpes simplex virus type 2 (HSV-2) and chlamydia infections, and a remote history of surgical procedures for a femur fracture and endometriosis. Medications included methadone, ritonavir-boosted lopinavir, a tenofovir–emtricitabine combination, valacyclovir, trazodone, quetiapine, and bupropion. She was allergic to sulfa drugs and levofloxacin. She was a student and lived in a drug-free group home. She smoked cigarettes. She reported no ingestion of raw food, exposure to sick contacts or animals, or recent travel.\r\n\r\nOn examination, the patient was obese; the vital signs and examination were otherwise normal. An electrocardiogram revealed sinus rhythm at a rate of 61 beats per minute, with anterior ST-segment and T-wave abnormalities similar to those seen on a previous tracing. A complete blood count and a white-cell differential count were normal, as were blood levels of electrolytes, urea nitrogen, creatinine, glucose, calcium, magnesium, phosphorus, total protein, albumin, globulin, iron, iron-binding capacity, creatine kinase isoenzymes, troponin I, and troponin T; testing for antinuclear and antimitochondrial antibodies was negative. Other test results are shown in Table 1. Toxicologic screening of the blood and the urine was negative. Results of ultrasonography of the abdomen showed a dilated common bile duct but were otherwise normal, without evidence of intrahepatic biliary-duct dilatation or sonographic Murphy''s sign (localized tenderness over the gallbladder). Urinary human chorionic gonadotropin testing was negative. Urinalysis revealed orange, cloudy fluid with 1+ bilirubin, 1+ albumin, 2+ urobilinogen, and 3 to 5 red cells and 0 to 2 white cells per high-power field, with mucin, few squamous cells, and bacteria present.\r\n\r\nDiagnostic procedures were performed.\r\nDifferential Diagnosis\r\n\r\nDr. Arthur Y. Kim: Although I was not involved in the care of this patient, I am aware of the diagnosis. This 41-year-old woman with well-controlled HIV-1 infection presented with nausea and abdominal pain, among other nonspecific symptoms. On serial evaluation, laboratory values were notable for a sudden elevation in hepatic aminotransferase levels and a prolonged prothrombin time. There were no signs of encephalopathy, and the coagulopathy did not initially meet the criteria for acute liver failure, which specify an international normalized ratio for prothrombin time greater than 1.5. The differential diagnoses of this patient''s acute liver disease include vascular, toxic, metabolic, and infectious causes, and on the basis of the laboratory data presented, they may be clinically indistinguishable. Nevertheless, the relative probability of each type of cause may be inferred from features of the history and presentation.\r\nIschemic Hepatitis\r\n\r\nThe predominantly hepatocellular pattern of the liver injury argues against certain insults that would produce a cholestatic pattern, such as intrahepatic cholestasis of pregnancy. However, acute liver injury of the magnitude seen in this patient may occur as a result of ischemia caused by hepatic congestion or diminished perfusion. Thrombotic complications are prevalent in persons with HIV-1 infection,1 and therefore, the Budd–Chiari syndrome and portal-vein thrombosis should be considered. The Budd–Chiari syndrome is more common in women, especially during pregnancy, but this patient was not pregnant and had no evidence of either the hepatomegaly or ascites that frequently accompanies hepatic-outflow obstruction.\r\n\r\nIschemic hepatitis may also occur in association with acute vasoconstriction (e.g., that caused by cocaine use) or prolonged hypotension, especially in persons who have known preexisting liver disease or congestive hepatopathy. However, this patient was not known to have these risk factors, and there was no other evidence of end-organ hypoperfusion, such as acute tubular necrosis of the kidney. The patient reported atypical chest pain with a pleuritic component; a large pulmonary embolism could cause both hypoperfusion and hepatic congestion due to pulmonary hypertension, but the normal vital signs argue against this diagnosis. Right-sided chest pain would be uncommon with acute hepatitis.\r\nAutoimmune Hepatitis\r\n\r\nCould this patient have had a flare of autoimmune hepatitis? The hepatic aminotransferase levels were not known to be elevated before this presentation, making autoimmune injury unlikely. This patient had a titer for anti–smooth muscle antibody of 1:40, which is not very specific at that low level. I suspect that the total globulin level was elevated, which is considered a key feature of autoimmune hepatitis. However, this finding is far less specific in a person with chronic HIV-1 infection, because of its associated polyclonal hyperglobulinemia.\r\nToxic Liver Injury\r\n\r\nIn this case, the most important noninfectious considerations are possible toxic injuries caused by the known prescribed medications or by the unreported use of alcohol, acetaminophen, or herbal products. The multiple vaccines the patient recently received are not likely culprits, and the toxicologic screening did not reveal alcohol, cocaine, or acetaminophen. Among prescription medications, antibiotics and antiretroviral therapies are most commonly associated with liver injury. In the 2 months before presentation, the patient may have received amoxicillin with clavulanate, a well-known cause of hepatocellular injury linked to specific HLA alleles.2 Most antiretroviral medications used to treat HIV-1 infection, including ritonavir-boosted lopinavir and a tenofovir–emtricitabine combination, have been implicated in liver injury, which is often manifested as asymptomatic elevations of liver enzymes. Typically, liver injury occurs within the first months after the initiation of antiretroviral medications,3 and to my knowledge, there were no recent changes in this patient''s regimen. Nonetheless, it would be tempting to stop the administration of antiretroviral medications, given the severity of her presentation.\r\nInfectious Causes of Hepatitis\r\n\r\nAlthough there are many infectious causes of liver injury, on the basis of the patient''s immunologic status and exposure history, I would focus on just a few. Despite harboring HIV-1, she achieved viral suppression and maintained CD4+ T-cell counts within the normal range, making opportunistic infections unlikely. She had no travel history to lead us to consider tropical diseases. Syphilitic hepatitis is a concern, given her history of unprotected intercourse and an evanescent rash, although a negative rapid plasma reagin test 1 week before presentation makes this diagnosis unlikely.\r\nViral Hepatitis\r\n\r\nHepatic injury to the extent seen in this patient has been reported in primary Epstein–Barr virus (EBV) and cytomegalovirus (CMV) infections; however, this patient was known to have had previous CMV infection, and given her age, it is highly likely that she had previously acquired EBV. Reactivation of each of the following viruses has been described as a cause of hepatitis, particularly in immunosuppressed hosts: EBV, CMV, varicella–zoster virus, HSV type 1 (HSV-1), and HSV-2. Such reactivation would be unexpected in this patient because of her well-controlled HIV-1 infection, normal CD4+ T-cell count, and use of prophylactic valacyclovir. The absence of an accompanying vesicular rash also argues against disseminated HSV or varicella–zoster virus. If a diagnosis did not become evident and the patient''s condition worsened, a biopsy of the liver should have been considered to search for characteristic viral inclusions and staining of viral antigen that are characteristic of these viral infections.\r\n\r\nHepatitis A, B, and C viruses (HAV, HBV, and HCV, respectively) are all primary considerations for any manifestation of acute liver injury. The patient recently was tested for all three viruses, suggesting that she had not been exposed to them in the past and was thus potentially susceptible to infection from each virus. Hepatitis delta superinfection would occur only in association with preexisting or current HBV infection. Hepatitis E infection is extremely unlikely in this region of the United States.\r\n\r\nHAV is acquired through a fecal–oral route of transmission. HAV infection is very likely to be symptomatic in adults, a feature consistent with this patient''s presentation, and evanescent rashes have been described during the illness. HAV infection is relatively uncommon in Massachusetts, and its incidence continues to decline throughout the United States. The patient did not report a travel history to areas where HAV is endemic, although it would be prudent to investigate whether any close contacts returned from such regions and infected her secondarily. Furthermore, the patient''s recent immunizations reduce her risk of having HAV infection, since vaccine administration even after an exposure is associated with a decrease in symptomatic illness.4 A diagnosis of HAV infection can be made if HAV-specific IgM is detected in the blood or if the virus is isolated from stool.\r\n\r\nIn the United States, HBV is usually acquired through parenteral or sexual routes. In contrast, perinatal transmission of the virus is common and the disease is endemic in areas without access to prophylactic strategies. The patient''s recent sexual partner is noted to be HIV-positive, but his HBV status is unknown; since these two viruses share risk factors for acquisition, coinfection is possible. Adults with acute HBV infection are likely to present symptomatically. In this patient, the regular use of tenofovir and emtricitabine, which are active against both HIV-1 and HBV, make a diagnosis of HBV infection unlikely.\r\n\r\nHCV shares routes of transmission with HIV, and thus coinfection is common. Up to 25% of persons with HIV-1 are also infected with HCV.5 Surveillance data in Massachusetts show an increase in the number of cases of HCV during the past decade,6 whereas the incidence of HAV and HBV has sharply declined. HCV is most efficiently transmitted through the blood, and the usual mode of transmission is the sharing of paraphernalia related to injection-drug use, a behavior that is sometimes underreported by patients to their providers. Given the report of unprotected intercourse, could sexual transmission have occurred in this case? Although sexual transmission of HCV across mucosal surfaces is inefficient, a confluence of factors may have facilitated the process. First, the sexual partner is more likely to harbor chronic HCV than chronic HBV in the blood and, thus, in the semen. Second, HIV-1 infection in either partner increases the likelihood of HCV transmission. 7\r\n\r\nIn contrast to this patient''s presentation, acute HCV infection is most often associated with few or no symptoms. Therefore, infected patients rarely seek medical attention,8 and the diagnosis may be easily missed, unless there is a high index of suspicion. No single laboratory test defines this stage of infection, since tests for HCV antibodies may be negative at the same time as tests for HCV RNA are positive (the infectious window period of seronegativity); hepatic serum HCV RNA levels may be low or even undetectable.9 The seronegative window period (the interval from HCV infection to anti-HCV seroconversion) in persons infected with HIV-1 may be longer than that in persons without HIV-1. 10 Thus, even if an HCV-antibody test is negative, one should test for molecular detection of HCV RNA. If HCV RNA is detected and is followed by HCV seroconversion, the diagnosis of acute HCV infection is established.\r\n\r\nAlthough liver injury induced by amoxicillin–clavulanate is a consideration, viral hepatitis remains the most plausible diagnosis. Given the low likelihood of infection with either HAV or HBV, acute HCV infection is the most likely diagnosis in this case.\r\n', 1, '2013-12-01 19:31:48'),
(2, 1, 'This patient was found wounded at the film shooting', 1, '2013-12-02 11:27:41'),
(3, 2, 'asdasdsdddd', 1, '2013-12-02 11:28:05'),
(4, 1, 'abdullah ', 1, '2013-12-05 19:36:08'),
(5, 1, 'hasha', 1, '2013-12-05 19:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient_case_doc_responses`
--

CREATE TABLE IF NOT EXISTS `hms_patient_case_doc_responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `response` text NOT NULL,
  `hms_patient_case_cid` int(11) NOT NULL,
  `hms_doctor_did` int(11) NOT NULL,
  `rec_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hms_patient_case_doc_responses_hms_patient_case1_idx` (`hms_patient_case_cid`),
  KEY `fk_hms_patient_case_doc_responses_hms_doctor1_idx` (`hms_doctor_did`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hms_patient_case_doc_responses`
--

INSERT INTO `hms_patient_case_doc_responses` (`id`, `response`, `hms_patient_case_cid`, `hms_doctor_did`, `rec_date`) VALUES
(1, 'This patient is done is ko jawab da kar farig karo hospital ki space', 1, 1, '0000-00-00 00:00:00'),
(4, 'asdkajdkja\r\nsdasd\r\n\r\ndsa\r\nd\r\nasas\r\nda\r\ndas\r\nd\r\nasd\r\nasd\r\nasda\r\nsdas\r\nds\r\ndas\r\nda\r\nsd\r\nasd\r\nasd\r\nasd\r\nasd', 1, 2, '2013-12-18 00:00:00'),
(5, 'he is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla bal', 1, 4, '2013-12-04 15:45:19'),
(6, 'he is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla balhe is one of the worse bla bla bal', 1, 4, '2013-12-04 15:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient_case_med`
--

CREATE TABLE IF NOT EXISTS `hms_patient_case_med` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_case_cid` int(11) NOT NULL,
  `med_name` varchar(100) NOT NULL,
  `frequency` int(11) DEFAULT NULL,
  `dose` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `rec_date` datetime NOT NULL,
  PRIMARY KEY (`id`,`patient_case_cid`),
  KEY `fk_patient_case_med_hms_patient_case1_idx` (`patient_case_cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hms_patient_case_med`
--

INSERT INTO `hms_patient_case_med` (`id`, `patient_case_cid`, `med_name`, `frequency`, `dose`, `status`, `rec_date`) VALUES
(1, 1, 'Panamax', 2, 3, 1, '2013-12-02 11:49:53'),
(2, 1, 'Kofol', 23, 32, 1, '2013-12-31 00:00:00'),
(3, 1, 'Ibtehaj', 34, 343, 1, '2013-12-04 15:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient_curr_med`
--

CREATE TABLE IF NOT EXISTS `hms_patient_curr_med` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_pid` int(11) NOT NULL,
  `med_name` varchar(100) NOT NULL COMMENT 'Patients current medication which is not provided by the hospital\n',
  `frequency` int(11) DEFAULT NULL,
  `dose` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `rec_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`patient_pid`),
  UNIQUE KEY `rec_date_UNIQUE` (`rec_date`),
  UNIQUE KEY `status_UNIQUE` (`status`),
  KEY `fk_hms_patient_curr_med_hms_patient1_idx` (`patient_pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient_has_hms_beds`
--

CREATE TABLE IF NOT EXISTS `hms_patient_has_hms_beds` (
  `patient_pid` int(11) NOT NULL,
  `beds_bid` int(11) NOT NULL,
  PRIMARY KEY (`patient_pid`,`beds_bid`),
  KEY `fk_hms_patient_has_hms_beds_hms_beds1_idx` (`beds_bid`),
  KEY `fk_hms_patient_has_hms_beds_hms_patient1_idx` (`patient_pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient_history`
--

CREATE TABLE IF NOT EXISTS `hms_patient_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_pid` int(11) NOT NULL,
  `history_details` text NOT NULL,
  `rec_date` datetime NOT NULL,
  PRIMARY KEY (`id`,`patient_pid`),
  KEY `fk_hms_patient_history_hms_patient1_idx` (`patient_pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hms_room`
--

CREATE TABLE IF NOT EXISTS `hms_room` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(25) NOT NULL COMMENT 'private general etc',
  `price_per_day` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hms_room_beds`
--

CREATE TABLE IF NOT EXISTS `hms_room_beds` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bed_status` tinyint(1) NOT NULL COMMENT 'occupied or free ',
  `room_rid` int(11) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `fk_hms_beds_hms_room1_idx` (`room_rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hms_room_type_facilities`
--

CREATE TABLE IF NOT EXISTS `hms_room_type_facilities` (
  `name` varchar(30) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  PRIMARY KEY (`room_type_id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hms_system_city`
--

CREATE TABLE IF NOT EXISTS `hms_system_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `system_country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hms_system_city_hms_system_country1_idx` (`system_country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hms_system_city`
--

INSERT INTO `hms_system_city` (`id`, `name`, `system_country_id`) VALUES
(1, 'Unknown', 1),
(2, 'Dhaka', 2),
(3, 'Karachi', 1),
(4, 'Gulshan-e-Hadeed', 1),
(5, 'Oranka', 5),
(6, 'Alaska', 6),
(7, 'bla ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hms_system_country`
--

CREATE TABLE IF NOT EXISTS `hms_system_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hms_system_country`
--

INSERT INTO `hms_system_country` (`id`, `name`) VALUES
(1, 'Pakistan'),
(2, 'Bangladesh'),
(3, 'Palestine'),
(4, 'Bangladesh'),
(5, 'Indonesia'),
(6, 'United States');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hms_doctort_address`
--
ALTER TABLE `hms_doctort_address`
  ADD CONSTRAINT `fk_hms_doctort_address_hms_doctor1` FOREIGN KEY (`doctor_did`) REFERENCES `hms_doctor` (`did`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hms_doctort_address_hms_system_city1` FOREIGN KEY (`system_city_id`) REFERENCES `hms_system_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_doctor_availability_timing`
--
ALTER TABLE `hms_doctor_availability_timing`
  ADD CONSTRAINT `fk_hms_doctor_availability_timing_hms_doctor_speciality1` FOREIGN KEY (`doctor_speciality_id`, `doctor_id`) REFERENCES `hms_doctor_speciality` (`id`, `doctor_did`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_doctor_has_hms_patient`
--
ALTER TABLE `hms_doctor_has_hms_patient`
  ADD CONSTRAINT `fk_hms_doctor_has_hms_patient_hms_doctor` FOREIGN KEY (`doctor_did`) REFERENCES `hms_doctor` (`did`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hms_doctor_has_hms_patient_hms_patient_case1` FOREIGN KEY (`hms_patient_case_cid`) REFERENCES `hms_patient_case` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_doctor_speciality`
--
ALTER TABLE `hms_doctor_speciality`
  ADD CONSTRAINT `fk_hms_doctor_speciality_hms_doctor1` FOREIGN KEY (`doctor_did`) REFERENCES `hms_doctor` (`did`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_management`
--
ALTER TABLE `hms_management`
  ADD CONSTRAINT `fk_hms_management_hms_management_user_level1` FOREIGN KEY (`management_user_level_id`) REFERENCES `hms_management_user_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_management_address`
--
ALTER TABLE `hms_management_address`
  ADD CONSTRAINT `fk_hms_management_address_hms_management1` FOREIGN KEY (`management_mid`) REFERENCES `hms_management` (`mid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hms_management_address_hms_system_city1` FOREIGN KEY (`system_city_id`) REFERENCES `hms_system_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_nurses_address`
--
ALTER TABLE `hms_nurses_address`
  ADD CONSTRAINT `fk_hms_nurses_address_hms_nurses1` FOREIGN KEY (`nurses_nid`) REFERENCES `hms_nurses` (`nid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hms_nurses_address_hms_system_city1` FOREIGN KEY (`system_city_id`) REFERENCES `hms_system_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_patient`
--
ALTER TABLE `hms_patient`
  ADD CONSTRAINT `fk_hms_patient_hms_management1` FOREIGN KEY (`profile_creator`) REFERENCES `hms_management` (`mid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_patient_address`
--
ALTER TABLE `hms_patient_address`
  ADD CONSTRAINT `fk_hms_patient_address_hms_patient1` FOREIGN KEY (`patient_pid`) REFERENCES `hms_patient` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hms_patient_address_hms_system_city1` FOREIGN KEY (`city_id`) REFERENCES `hms_system_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_patient_case`
--
ALTER TABLE `hms_patient_case`
  ADD CONSTRAINT `fk_hms_patient_case_hms_patient1` FOREIGN KEY (`hms_patient_pid`) REFERENCES `hms_patient` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_patient_case_doc_responses`
--
ALTER TABLE `hms_patient_case_doc_responses`
  ADD CONSTRAINT `fk_hms_patient_case_doc_responses_hms_doctor1` FOREIGN KEY (`hms_doctor_did`) REFERENCES `hms_doctor` (`did`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hms_patient_case_doc_responses_hms_patient_case1` FOREIGN KEY (`hms_patient_case_cid`) REFERENCES `hms_patient_case` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_patient_case_med`
--
ALTER TABLE `hms_patient_case_med`
  ADD CONSTRAINT `fk_patient_case_med_hms_patient_case1` FOREIGN KEY (`patient_case_cid`) REFERENCES `hms_patient_case` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_patient_curr_med`
--
ALTER TABLE `hms_patient_curr_med`
  ADD CONSTRAINT `fk_hms_patient_curr_med_hms_patient1` FOREIGN KEY (`patient_pid`) REFERENCES `hms_patient` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_patient_has_hms_beds`
--
ALTER TABLE `hms_patient_has_hms_beds`
  ADD CONSTRAINT `fk_hms_patient_has_hms_beds_hms_beds1` FOREIGN KEY (`beds_bid`) REFERENCES `hms_room_beds` (`bid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hms_patient_has_hms_beds_hms_patient1` FOREIGN KEY (`patient_pid`) REFERENCES `hms_patient` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_patient_history`
--
ALTER TABLE `hms_patient_history`
  ADD CONSTRAINT `fk_hms_patient_history_hms_patient1` FOREIGN KEY (`patient_pid`) REFERENCES `hms_patient` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_room_beds`
--
ALTER TABLE `hms_room_beds`
  ADD CONSTRAINT `fk_hms_beds_hms_room1` FOREIGN KEY (`room_rid`) REFERENCES `hms_room` (`rid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_room_type_facilities`
--
ALTER TABLE `hms_room_type_facilities`
  ADD CONSTRAINT `fk_hms_room_type_facilities_hms_room_type1` FOREIGN KEY (`room_type_id`) REFERENCES `hms_room` (`rid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hms_system_city`
--
ALTER TABLE `hms_system_city`
  ADD CONSTRAINT `fk_hms_system_city_hms_system_country1` FOREIGN KEY (`system_country_id`) REFERENCES `hms_system_country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
