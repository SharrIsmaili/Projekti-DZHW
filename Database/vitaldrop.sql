-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2026 at 11:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitaldrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_ID` int(11) NOT NULL,
  `Date_Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Location` varchar(30) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Staff_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_blood`
--

CREATE TABLE `appointment_blood` (
  `Appointment_ID` int(11) NOT NULL,
  `Blood_ID` int(11) NOT NULL,
  `FKAppointment_ID` int(11) NOT NULL,
  `FKBlood_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `Blood_ID` int(11) NOT NULL,
  `Blood_Type` varchar(3) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comments_ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(10000) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `News_ID` int(11) NOT NULL,
  `Date_Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Title` varchar(100) NOT NULL,
  `Content` varchar(10000) NOT NULL,
  `Image` blob DEFAULT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`News_ID`, `Date_Time`, `Title`, `Content`, `Image`, `User_ID`) VALUES
(14, '2026-02-01 18:09:45', 'Mum\'s plea for plasma donors after child\'s illness', 'A London mum is urging people to donate plasma after her daughter needed urgent treatment for a rare childhood illness that can affect the heart.\r\n\r\nRebecca\'s daughter was seven when she was diagnosed with Kawasaki disease, a condition she had \"only ever heard of\" from a Grey\'s Anatomy episode.\r\n\r\nWinifred received intravenous immunoglobulin which was made from donated plasma. Now aged nine, she has recovered and only needs regular check-ups.\r\n\r\nNHS Blood and Transplant said plasma donors played a \"vital role\" in making sure treatments like immunoglobulin were available for children who need them, and Rebecca said she wanted to help ensure other families can access the life-saving care.\r\n\r\nRebecca\'s daughter became unwell in December 2023 with a fever that lasted several days.\r\n\r\n\"At first it just seemed like a normal illness,\" Rebecca said.\r\n\r\n\"She wasn\'t extremely unwell. She just had a temperature and didn\'t feel herself.\"\r\n\r\nAfter checks at hospital, the family were reassured and sent home but she later developed an unexplained rash across her body.\r\n\r\nRebecca shared photos of the rash with a friend who is a pediatric A&E consultant. He advised her to return to hospital so doctors could rule out Kawasaki disease.\r\n\r\n\"At that point, I\'d only ever heard of it from a Grey\'s Anatomy episode,\" Rebecca said.\r\n\r\n\"I never imagined it could be something that would affect my own child.\"\r\nWinifred was taken to the Royal Free Hospital in London, where she was diagnosed with Kawasaki disease, which causes inflammation in blood vessels and can damage the heart if left untreated.\r\n\r\nBecause the condition was picked up quickly, Winifred was given urgent intravenous immunoglobulin, a treatment made from donated plasma.\r\n\r\nEarly treatment is known to significantly reduce the risk of long-term heart problems.\r\n\r\nRebecca said her daughter \"was discharged quickly and was back at school within days\".\r\n\r\nNow aged nine, she is fit and well and no longer needs medication, although she continues to attend routine follow-up appointments, her mother said.\r\n\r\nKawasaki disease can be difficult to diagnose, as its symptoms often resemble more common childhood illnesses.\r\n\r\nDelays in treatment can increase the risk of serious heart complications.', 0x75706c6f6164732f6e6577732f6e6577735f363937663838643933386635302e77656270, 1),
(15, '2026-02-01 18:12:45', 'Plasma medicine recipient thanks donors', 'A woman who has relied on plasma-derived medicines for 22 years has met local plasma donors to thank them and share how donations have improved her life.\r\n\r\nMargaret Bennett, a 73-year-old retired teacher from Birmingham, has needed the medicines to manage an immune condition called Common Variable Immunodeficiency (CVID).\r\n\r\nWithout medicines made from human plasma, Mrs Bennett would be unable to fight off infections, leading to serious illness.\r\n\r\nAs a former teacher, she often found herself battling common colds and infections but would struggle more than her colleagues to shake off the effects.\r\n\r\n“I said to my doctor, ‘Yes, I am a teacher, but so are all my friends and they are not ill all the time,’” she said.\r\n\r\nAfter many tests, she was diagnosed with CVID, which significantly weakens the immune system.\r\n\r\nMrs Bennett received her first intravenous immunoglobulin infusion in August 2003 and has since been treated with different types of immunoglobulin products, all derived from donated plasma.\r\n\r\n“Plasma-derived medicines make a huge difference in my ability to live my life, to travel, to see family, and to spend time with my friends without constantly being poorly,” Mrs Bennett said.\r\n\r\n“I am so grateful for the medical teams and donors who help patients like me to enjoy a better quality of life all year round.”\r\n\r\nMrs Bennett recently paid a visit to the NHS Blood and Transplant plasma donor centre in New Street, Birmingham, meeting some of the donors and speaking about how their donations made a difference to her life.\r\n\r\nOne of those donors was Benedict Reeves, who said:\r\n\r\n“Before meeting Margaret, I knew donating plasma was important, but hearing her story and how plasma-derived medicines help patients is truly inspiring.\r\n\r\n“I can now imagine more clearly the impact my donation can make on someone’s life, and it encourages me to keep on donating.\r\n\r\n“It’s humbling to know that something so simple can make such a difference in someone’s life.”\r\n\r\nMark Bailey, Birmingham Plasma Donor Centre manager, said:\r\n\r\n“It has been incredible to have Margaret here to meet some of our donors, who were grateful to her for sharing her story and seeing and hearing the difference that their life-saving donations can make.”\r\n\r\nMilestone year\r\n\r\nThe year 2025 marked a significant milestone for the UK’s plasma for medicines programme.\r\n\r\nIn March, NHS patients started receiving lifesaving medicines made from plasma donated by blood and plasma donors in England for the first time in 25 years, after a long-standing ban was lifted.\r\n\r\nWithin the first six months alone, more than 2,200 people in the UK benefited from immunoglobulin made from UK-donated plasma.\r\n\r\nMaking a plea for donors to book appointments, Mrs Bennett said:\r\n\r\n“Many patients who rely on regular infusions need their treatments during this time of year to fight off winter illnesses, which could otherwise severely impact our health and even leave us needing urgent hospital treatment.\r\n\r\n“Seeing so many people here today, giving up their spare time to donate plasma, is incredibly moving. Their selflessness will help patients who are depending on these life-changing medicines.”', 0x75706c6f6164732f6e6577732f6e6577735f363937663839386438313666652e77656270, 1),
(16, '2026-02-01 18:14:51', 'Only one known person in the world can save my life', 'The world has a population of more than eight billion, but only one known person can currently save Sian Chathyoka, who has a rare blood cancer.\r\n\r\nSian, 56, said it was “very difficult to be upbeat” after being told last year that she needed a stem cell transplant to survive, following a diagnosis of aggressive myelofibrosis. The mother of two was shocked to discover there was just one matching donor on the global register.\r\n\r\nA former social worker, Sian is now preparing to receive a transplant from a “selfless stranger” and has urged others to sign up to become stem cell donors.\r\n\r\nStem cell transplants offer “the last chance of life” for many blood cancer patients, according to the charity Anthony Nolan.\r\n\r\nImage caption:\r\nSian Chathyoka smiles in a close-up selfie while lying in a hospital bed, with a drip in her left arm. She is wearing a green knitted jumper and blue square glasses.\r\n\r\nSian Chathyoka was diagnosed with myelofibrosis, a rare form of blood cancer, in September 2025.\r\n\r\nFrom Swansea, Sian led an active lifestyle before becoming ill, including cold water swimming, running the family campsite and caring for her children, aged 18 and 13.\r\n\r\nShe first realised something was wrong when she was hit by “extreme fatigue”, which left her struggling to get out of her chair.\r\n\r\n“Since August, I’ve just been lying in bed because I’ve had no energy,” Sian said.\r\n\r\n“I’ve had such a level of fatigue, I haven’t been able to do anything and it’s been quite scary.”\r\n\r\nWhen she noticed that she had lost 5lb (2.3kg) without trying, Sian visited her GP and was sent for immediate blood tests.\r\n\r\n“They came back and they were scattered all over the place,” she explained.\r\n\r\nFurther CT and MRI scans revealed an enlarged spleen and, in September 2025, she was diagnosed with myelofibrosis.\r\n\r\n“I couldn’t stop crying,” she said.\r\n\r\n“My condition is very rare. I’ve been told my disease is aggressive as well.\r\n\r\n“When you take away the layers it’s absolutely petrifying. But you’ve got to forget about that and be positive.”', 0x75706c6f6164732f6e6577732f6e6577735f363937663861306236393665392e706e67, 1),
(17, '2026-02-01 18:16:20', 'Brixton blood centre now accepting group donations', 'Brixton Blood Donor Centre is launching a new service to boost the number of Black blood donors.\r\n\r\nThe south London donation centre now allows people to give blood together as part of a group booking.\r\n\r\nThe change follows feedback from Black heritage groups, who said they were more likely to become regular blood donors if they could donate with faith, community or friendship groups.\r\n\r\nMark Chambers, from NHS Blood and Transplant (NHSBT), said:\r\n\r\n“The initiative is about creating a shared experience that makes donating more welcoming, inspiring and impactful — especially for first-time donors — in a setting that feels more like community than clinic.”\r\n\r\nSarah-Jane Nkrumah, from Sickle Cell Unite, a London group that has used the new system, said:\r\n\r\n“We believe group bookings are incredibly important because they bring the community together.\r\n\r\n“People are often more comfortable donating blood when they attend with friends or as part of a group; that sense of shared purpose really matters.\r\n\r\n“It becomes more than just an opportunity to save lives — it’s a chance to do something meaningful together.”\r\n\r\nSickle cell is the country’s fastest-growing inherited blood disorder, and around 15,000 to 18,500 people live with the condition, making it the most common genetic condition in the UK.\r\n\r\nEvery year, around 300 babies are born with sickle cell, which is more prevalent in people of Black ethnic heritage.\r\n\r\nBlood donors of African, Caribbean or mixed ethnic backgrounds are 10 times more likely than white donors to have the specific Ro blood subtype needed to treat the life-long condition.\r\n\r\nA person with sickle cell may need blood from up to 100 donors every year to stay healthy.', 0x75706c6f6164732f6e6577732f6e6577735f363937663861363430396632372e77656270, 1),
(18, '2026-02-01 18:17:07', 'Your NHS: The volunteer team delivering blood for the NHS', '“Hardly anyone even knows who we are or what we do,” says a motorcyclist who has been making potentially life-saving journeys for 18 years.\r\n\r\nRobin Carter is a volunteer for SERV, a charity which delivers blood to NHS hospitals across Oxfordshire, Buckinghamshire, Berkshire, Northamptonshire and Hampshire.\r\n\r\nThe team’s network of drivers often works in the middle of the night and at off-peak times, taking crucial cargo where it is needed.\r\n\r\n“I may be just a little cog, but I may be just doing something to help someone,” Mr Carter said.\r\n\r\nDuring a recent late-night drop-off to the John Radcliffe Hospital in Oxford, Mr Carter met with a fellow rider and the chairman of SERV, Kamran Irani.\r\n\r\n“In 2025, from January to December, we did over 4,000 consignments,” Mr Irani said.\r\n\r\nThe charity’s dedicated fleet of motorcycles and 4x4 vehicles provides a rapid-response courier service and also delivers human milk, spinal fluid, scans and patient notes.\r\n\r\nMariana Constantin, from the blood bank team at the Royal Berkshire Hospital, knows just how vital the work of the charity can be.\r\n\r\nShe said: “When everybody goes to bed, SERV are there. They’re available to transport blood at an hour’s notice, which means our patients can have blood transfusions when they need them.”', 0x75706c6f6164732f6e6577732f6e6577735f363937663861393336376133622e77656270, 1),
(19, '2026-02-01 18:18:00', 'Hospital charity gets record-breaking £435k gift', 'A hospital charity has received a “record-breaking” donation of more than £450,000.\r\n\r\nThe Royal Papworth Hospital Charity (RPHC) said £453,611.60 was given by Wendy J. Tomlin-Hess — the largest donation by an individual in its 30-year history.\r\n\r\nDescribed by RPHC as an “extraordinary act of philanthropy”, the gift was a “thank you” to Royal Papworth Hospital in Cambridge for saving the life of her brother, Terry Tomlin, who underwent a pioneering heart transplant in 2015.\r\n\r\n“We are extremely grateful to Terry’s heart donor and their family, who gave him a gift we could never repay — the gift of life,” said Ms Tomlin-Hess.\r\n\r\nRPHC said the money would help accelerate research and innovation in heart transplantation.\r\n\r\nTerry Tomlin, from Leicestershire, was one of the first transplant patients in Europe to receive a non-beating heart, known as donation after circulatory death (DCD).\r\n\r\nRoyal Papworth was the first hospital in Europe to perform a heart transplant using the DCD method.\r\n\r\nMs Tomlin-Hess, who was born in Britain and now lives in the United States, said:\r\n\r\n“I am now very happy to be in a position where I can truly thank Royal Papworth with a donation that will help to save many, many more lives.”\r\n\r\nRPHC said the donation would support three projects: improving donor heart assessment; extending preservation times for donor hearts; and testing affordable technology for perfusion — the process by which blood is supplied to an organ.', 0x75706c6f6164732f6e6577732f6e6577735f363937663861633835643639632e77656270, 1),
(20, '2026-02-01 18:19:29', '\"We\'re giving transplant patients a second chance\"', 'Each time stem cells are sent to a new destination for transplant from Nottingham, staff proudly stick a pin on a map on the wall.\r\n\r\nThose at the Anthony Nolan Cell Collection Centre, based at Nottingham’s Queen’s Medical Centre (QMC), have been mapping its progress across the globe since it opened in July.\r\n\r\nSo far, 59 donors have given cells for transplant. Of these, 32 samples have gone to patients in the UK, with the remainder sent around the world.\r\n\r\nMike Smith, stem cell laboratory manager, said:\r\n\r\n“Across the globe, transplant recipients are being given that second chance.”\r\n\r\nHe said the unit was having an increasing impact, with cells sent to more than 12 countries.\r\n\r\n“So we’ve gone to America, Canada, down to South America and Buenos Aires, all the way across to Australia — which was one of our first donations — a lot in Europe, and then in India,” he added.\r\n\r\nThe Anthony Nolan charity said the centre would create 1,300 new donation slots a year, helping to tackle a “longstanding global shortage of cell collection facilities”.\r\n\r\nSince the first donors were welcomed, Anthony Nolan said it had been getting donations to transplant teams more quickly.\r\n\r\nJordan, from London, was among the first to donate at the unit.\r\n\r\nHe said he was “proud to be helping a stranger” and hoped the centre would be a “gamechanger” in getting cells to transplant recipients in a more timely way.', 0x75706c6f6164732f6e6577732f6e6577735f363937663862323138303166652e77656270, 1),
(21, '2026-02-01 18:20:19', 'Super donors urge others to help save lives', 'One of only 10 people in England to have given blood, stem cells, platelets and plasma since 2005 has said the small act could make a “big difference to lives”.\r\n\r\n“Super donor” Anthony Robson, from Stockton, said he was inspired to become a donor at the age of 18 because of his mother, who used to give blood as “part of a routine”.\r\n\r\nThe 33-year-old said giving regularly was “rewarding”, gave him a sense of “achievement”, and he urged others to sign up.\r\n\r\nEarlier this year, NHS Blood and Transplant (NHSBT) said the number of regular donors needed to rise from around 800,000 to more than one million to maintain a safe and reliable supply.\r\n\r\nMr Robson said health workers at donor centres made giving blood as comfortable as possible, especially for those who had never donated before.\r\n\r\n“The little act can make such a big difference,” he said.\r\n\r\nJust two per cent of the population keeps the nation’s blood stocks afloat by donating regularly, NHSBT said.\r\n\r\nAndrew Bruce, 58, a fire safety adviser from West Auckland in County Durham, is another super donor who gives blood, stem cells, plasma and platelets.\r\n\r\nHe said he was approaching his 99th donation and that, even though stem cell donation was painful, he would “definitely do it again”.\r\n\r\n“It’s a few hours of pain to give someone the chance of life or to extend their life,” he said.\r\n\r\nPlasma donations, which are used to create immunoglobulin medicines, take about 30 to 40 minutes. Mr Bruce said the experience was not “unpleasant”.\r\n\r\n“It’s really easy to do and there is a real need out there for more donors,” he added.', 0x75706c6f6164732f6e6577732f6e6577735f363937663862353362346437352e77656270, 1),
(22, '2026-02-01 18:21:02', 'Blood supplies run low after wintry weather hits donations', 'Blood supplies for transfusions in Scotland are running low after recent snow and freezing temperatures led to a drop-off in donations.\r\n\r\nThe Scottish National Blood Transfusion Service (SNBTS) has issued an appeal for donors to help rebuild stocks, with six of the eight blood groups particularly in demand.\r\n\r\nPeople are being urged to book an appointment at one of the donor centres in Aberdeen, Dundee, Edinburgh, Glasgow or Inverness, or to attend community donation sessions.\r\n\r\nDonated blood has a shelf life of up to 35 days and is split into different products, some of which can only be stored for much shorter periods.\r\n\r\nDr Sylvia Armstrong-Fisher, from SNBTS, said Scotland needs about 450 blood donors every day to meet the needs of hospital patients.\r\n\r\n“This does not take a rest because of bad weather. However, fewer people are donating than before, and this puts pressure on Scotland’s blood supply,” she said.\r\n\r\n“I am urging both new and returning donors to come forward to help ensure lifesaving blood is always available.”\r\n\r\nSNBTS said its main donation centres had been “quiet” during the wintry weather and that it was running short of O+, A+, B+, AB+ and O- blood types.\r\n\r\nEach donation is split into three separate components: red cells, platelets and plasma.\r\n\r\nPlatelets, which help stop bleeding and support people undergoing cancer treatment, have a shelf life of just seven days.\r\n\r\nAbout half of Scotland’s platelet supply comes from dedicated platelet donors, but this must be supplemented by whole blood donations — with four whole blood donations needed to make up a single unit of platelets.\r\n\r\nOther specialised products, such as blood given to a baby still in the womb, are never more than five days old.\r\n\r\nIn addition to the impact of the weather, SNBTS has observed a long-term decline in the number of people who regularly donate blood.', 0x75706c6f6164732f6e6577732f6e6577735f363937663862376564303061342e77656270, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Location` varchar(30) NOT NULL,
  `Specialization` varchar(255) DEFAULT NULL,
  `Image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Name`, `Lastname`, `Email`, `Phone_Number`, `Location`, `Specialization`, `Image`) VALUES
(4, 'Blerina', 'Cenaj', 'blerinacenaj@gmail.com', '', 'Prishtine', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653534333335396636612e6a7067),
(5, 'Era', 'Sula', 'erasula@gmail.com', '', 'Prishtine', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653534386164356137352e706e67),
(6, 'Flamur', 'Begu', 'flamurbegu@gmail.com', '', 'Mitrovice', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653535303437666661392e706e67),
(7, 'Fatjon ', 'Deda', 'fatjondeda@gmail.com', '', 'Mitrovice', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653535346339653662632e6a7067),
(8, 'Era', 'Beqiri', 'erabeqiri@gmail.com', '', 'Peje', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653536303334363661622e6a7067),
(9, 'Sokol', 'Shehi', 'sokolshehi@gmail.com', '', 'Peje', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653537306364366535352e6a7067),
(10, 'Genc', 'Bogdani', 'gencbogdani@gmail.com', '', 'Prizren', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653537356436326239332e6a7067),
(11, 'Miranda', 'Qosja', 'mirandaqosja@gmail.com', '', 'Prishtine', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653537656130386363342e706e67),
(12, 'Gjon', 'Lika', 'gjonlika@gmail.com', '', 'Prishtine', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653538326139346161662e6a7067),
(13, 'Roan', 'Dushku', 'roandushku@gmail.com', '', 'Prishtine', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653561313765306634302e6a7067),
(14, 'Albana', 'Tafa', 'albanatafa@gmail.com', '', 'Mitrovice', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653561383163346561322e706e67),
(15, 'Agim', 'Xhafa', 'agimxhafa@gmail.com', '', 'Mitrovice', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653562313834316265372e6a7067),
(16, 'Artan', 'Mumajesi', 'artanmumajesi@gmail.com', '', 'Mitrovice', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653562336634653431632e706e67),
(17, 'Era', 'Toska', 'eratoska@gmail.com', '', 'Peje', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653562383464366261652e6a7067),
(18, 'Amar', 'Guri', 'amarguri@gmail.com', '', 'Peje', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653563666436363164362e706e67),
(19, 'Lumnije', 'Azemi', 'lumnijeazemi@gmail.com', '', 'Peje', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653564336162373130302e706e67),
(20, 'Bogdan', 'Pjetri', 'bogdanpjetri@gmail.com', '', 'Prizren', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653564366633343531322e6a7067),
(21, 'Arben', 'Beni', 'arbenbeni@gmail.com', '', 'Prizren', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653565393637353061642e6a7067),
(22, 'Kreshnik', 'Ismaili', 'kreshnikismaili@gmail.com', '', 'Prizren', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653565633339663430312e6a7067),
(23, 'Shukrije', 'Ramadani', 'shukrijeramadani@gmail.com', '', 'Ferizaj', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653566316635363232372e6a706567),
(24, 'Doruntina', 'Shala', 'doruntinashala@gmail.com', '', 'Ferizaj', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653566616134333737652e6a7067),
(25, 'Blerina', 'Vjollca', 'blerinavjollca@gmail.com', '', 'Ferizaj', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653566663936353932372e77656270),
(26, 'Blenda', 'Zekaj', 'blendazekaj@gmail.com', '', 'Gjilan', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653631306131653532392e77656270),
(27, 'Kasap', 'Thaqi', 'kasapthaqi@gmail.com', '', 'Gjilan', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653631336436636539312e77656270),
(28, 'Almir', 'Bungu', 'almirbungu@gmail.com', '', 'Gjilan', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653631376137346361312e6a7067),
(29, 'Erjon', 'Gerguri', 'erjongerguri@gmail.com', '', 'Gjilan', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653631613239663166662e6a7067),
(30, 'Rron', 'Gashi', 'rrongashi@gmail.com', '', 'Gjilan', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653631643365346661652e6a7067),
(31, 'Arbnor', 'Halilaj', 'arbnorhalilaj@gmail.com', '', 'Gjakove', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653632316564356461312e6a7067),
(32, 'Greta', 'Isufi', 'gretaisufi@gmail.com', '', 'Gjakove', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653632366562323435332e6a7067),
(34, 'Xhevdet', 'Begu', 'xhevdetbegu@gmail.com', '', 'Gjakove', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653632626165303632322e6a7067),
(37, 'Fatmir', 'Beholli', 'fatmirbeholli@gmail.com', '', 'Gjilan', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653633303431316238642e6a7067),
(38, 'Besjana', 'Haxhiu', 'besjanahaxhiu@gmail.com', '', 'Gjakove', 'Nurse', 0x75706c6f6164732f73746166662f73746166665f363937653633323634643865372e6a7067),
(39, 'Rina', 'Balaj', 'rinabalaj@gmail.com', '', 'Prizren', 'Doctor', 0x75706c6f6164732f73746166662f73746166665f363937653633373638623632332e77656270);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Name`, `Lastname`, `Email`, `Phone_Number`, `Password`, `isAdmin`) VALUES
(1, 'Sharr', 'Ismaili', 'sharrismaili@gmail.com', '044123456', '$2y$10$WAj1W/w/7GV9yM.nS0CFl.cAGhSv2OMqMbAtjcx3cX/QsH25WfGbO', 1),
(2, 'Elsa', 'Rizani', 'elsarizani@gmail.com', '', '$2y$10$awzncMRpkXUUP7USpjz3C.sVjGkeDPiNtlI2AIgJ.ZkQiYSfyGkmC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `Appointment_User` (`User_ID`),
  ADD KEY `Appointment_Staff` (`Staff_ID`);

--
-- Indexes for table `appointment_blood`
--
ALTER TABLE `appointment_blood`
  ADD PRIMARY KEY (`Appointment_ID`,`Blood_ID`),
  ADD KEY `Appointment_Blood` (`FKBlood_ID`),
  ADD KEY `Appointment` (`FKAppointment_ID`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`Blood_ID`),
  ADD KEY `Blood_User` (`User_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comments_ID`),
  ADD KEY `Comments_Users` (`User_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`),
  ADD KEY `Feedback_Users` (`User_ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_ID`),
  ADD KEY `fk_user_ID` (`User_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `Blood_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comments_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `News_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `Appointment_Staff` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`),
  ADD CONSTRAINT `Appointment_User` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `appointment_blood`
--
ALTER TABLE `appointment_blood`
  ADD CONSTRAINT `Appointment` FOREIGN KEY (`FKAppointment_ID`) REFERENCES `appointments` (`Appointment_ID`),
  ADD CONSTRAINT `Appointment_Blood` FOREIGN KEY (`FKBlood_ID`) REFERENCES `blood` (`Blood_ID`);

--
-- Constraints for table `blood`
--
ALTER TABLE `blood`
  ADD CONSTRAINT `Blood_User` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Comments_Users` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `Feedback_Users` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_user_ID` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
