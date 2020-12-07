-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 12:09 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` double DEFAULT NULL,
  `s_year` varchar(100) DEFAULT NULL,
  `Rollno` double DEFAULT NULL,
  `Dept_name` varchar(50) NOT NULL,
  `g_id` varchar(100) DEFAULT NULL,
  `S_name` varchar(100) DEFAULT NULL,
  `Stud_mobile` double DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `par_mobile` double DEFAULT NULL,
  `par_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `s_year`, `Rollno`, `Dept_name`, `g_id`, `S_name`, `Stud_mobile`, `Email`, `par_mobile`, `par_email`) VALUES
(20170770, 'TE', 1, 'IT', 'DT1', 'AAKANKSHA PADMANABHAN UMA', 9757238859, 'a.padmanabhan@somaiya.edu', 7738368877, 'padmanabhanuma@yahoo.com'),
(20170245, 'TE', 2, 'IT', 'DT1', 'AGRAWAL TANMAY VINAY RAMA', 8888022190, 'tannumittal.agrawal@gmail.com', 9511618126, 'tanmay.agrawal@somaiya.edu'),
(20171416, 'TE', 3, 'IT', 'DT1', 'BAJRIYA KRUTIK ASHOK HANSA', 9773928839, 'krutik.bajriya@somaiya.edu', 9820827003, 'krutiksmartguy@gmail.com'),
(20171422, 'TE', 4, 'IT', 'DT1', 'CHOUDHARY KULDEEP SARJUKUMAR SANAINA', 7977763205, 'kuldeep.c@somaiya.edu', 9892104303, 'sarjuchoudhary23@gmail.com'),
(20171671, 'TE', 5, 'IT', 'DT1', 'CHOUDHARY RADHIKA SHYAM MADHU', 8169120755, 'radhika.sc@somaiya.edu', 9819263226, 'shyam1508@gmail.com'),
(20171635, 'TE', 6, 'IT', 'DT1', 'D KUMAR KOUSHAL RAJENDRA VENU', 8850577012, 'dkoushal.d@somaiya.edu', 9892958810, 'kdrajendra@yahoo.com'),
(20171493, 'TE', 7, 'IT', 'DT1', 'DAMA RIDHI MAHENDRA NEETA', 9768332882, 'ridhi.dama@somaiya.edu', 9820852111, 'mahendradama1977@gmail.com'),
(20170245, 'TE', 8, 'IT', 'DT1', 'DEDHIA AAYUSH SHAILESH SAROJ', 7021365705, 'aayush.sd@somaiya.edu', 9869381357, 'shaileshdedhia10@gmail.com'),
(20170769, 'TE', 9, 'IT', 'DT1', 'DESHPANDE YASH DEEPAK PRIYA', 9029878778, 'deshpande.y@somaiya.edu', 9860921476, 'deepak.deshpande@sbi.co.in'),
(20171400, 'TE', 10, 'IT', 'DT1', 'DHOLAKIA RIDDHI PRAVIN CHHAYA', 9029378546, 'riddhi.dholakia@somaiya.edu', 9867478940, 'riddhidholakia924@gmail.com'),
(20171231, 'TE', 11, 'IT', 'DT1', 'DOSSA INZIYA SARFARAZ FATIMA', 9867391961, 'inziya.dossa@somaiya.edu', 9833656876, 'sharfarazd@rediffmail.com'),
(20170746, 'TE', 12, 'IT', 'DT1', 'GANDHI PRUTHIL JAYESH JIGNA', 7875708276, 'pruthil.g@somaiya.edu', 9167025151, 'jayesh.poojaplywood@gmail.com'),
(20171016, 'TE', 13, 'IT', 'DT1', 'GHELANI UDIT JAYESH HARSHA', 9769481582, 'udit.ghelani@somaiya.edu', 8849681490, 'jayeshghelani01@yahoo.co.in'),
(20170541, 'TE', 14, 'IT', 'DT1', 'GHOSH TOMAL DINABANDHU SOMA', 8983465930, 'ghoshtomal1999@gmail.com', 8390023040, 'dinabandhughosh1969@gmail.com'),
(20171256, 'TE', 15, 'IT', 'DT1', 'GIDWANI PAYAL BALRAM HONEY', 8080837340, 'payal.gidwani@somaiya.edu', 9422667373, 'harshitagidwani7@yahoo.com'),
(20171369, 'TE', 16, 'IT', 'DT1', 'GORI URMI MANJI AMRUTA', 8451983264, 'urmi.gori@somaiya.edu', 9833292875, 'urmigori13@gmail.com'),
(20180065, 'TE', 17, 'IT', 'DT1', 'ADHIYA YASH DINESH MINAL', 8379087478, 'yash.adhiya@somaiya.edu', 9545741150, 'dineshadhiya6@gmail.com'),
(20170567, 'TE', 18, 'IT', 'DT1', 'JAIN NIRAJ SURAJMAL LALITA', 8452095566, 'niraj.sj@somaiya.edu', 9920811268, 'njain2698.nj@gmail.com'),
(20171190, 'TE', 19, 'IT', 'DT1', 'JOSHI HITAISHI VIJAY JAHNAVI', 9769031634, 'hitaishi.j@somaiya.edu', 9869015289, 'vijayj97@gmail.com'),
(20170128, 'TE', 20, 'IT', 'DT1', 'JOSHI SWAPNIL HARESH ALKA', 9969942349, 'swapnil.hj@somaiya.edu', 9867784297, 'hareshv@rediffmail.com'),
(20171252, 'TE', 21, 'IT', 'DT1', 'KANANI PARTH NILESH CHAITALI', 9833914092, 'parth.kanani@somaiya.edu', 9320481728, 'nilesh69@gmail.com'),
(20171303, 'TE', 22, 'IT', 'DT2', 'KHATI ADITYA MOHAN GAYATRI', 9594976005, 'aditya.khati@somaiya.edu', 9657013731, 'khatimohan@gmail.com'),
(20170999, 'TE', 23, 'IT', 'DT2', 'KOTAK MANAN BIPIN NITA', 9833988452, 'manan.bk@somaiya.edu', 9821048036, 'bipinkotak68@gmail.com'),
(20171160, 'TE', 24, 'IT', 'DT2', 'KOTAK MEET NITIN CHETNA', 9892024252, 'chetna_nkotak@yahoo.in', 9769444107, 'chetna_nkotak@yahoo.in'),
(20171189, 'TE', 25, 'IT', 'DT2', 'KUMAR GAURAV SACHINDRA REKHA', 9769749878, 'g.kumar@somaiya.edu', 8879109985, 'sachindrayadav77@gmail.com'),
(20170911, 'TE', 26, 'IT', 'DT2', 'KUMAR SHUBHAM RP SINGH KALPANA', 9867087831, 'shubham.rk@somaiya.edu', 9869405562, 'rabindra.singh11@yahoo.com'),
(20171564, 'TE', 27, 'IT', 'DT2', 'KUNVERJI KRUTI JATIN SMITA', 9967844002, 'kruti.kunverji@somaiya.edu', 9322163216, 'kunverji@yahoo.com'),
(20170338, 'TE', 28, 'IT', 'DT2', 'LAHA ABHISHEK ASHOK SONALI', 9769079206, 'abhishek.laha@somaiya.edu', 9867851009, 'lahaashok8@gmail.com'),
(20171132, 'TE', 29, 'IT', 'DT2', 'MADALIYA YAGNIK AMBABHAI HANSABEN', 7666932747, 'yagnik.m@somaiya.edu', 9594655303, 'madaliyayagnik1028@gmail.com'),
(20171686, 'TE', 30, 'IT', 'DT2', 'MAJITHIA KINJAL LAKHU JAYSHREE', 9769789313, 'kinjal.majithia@somaiya.edu', 9819767991, 'kalpanamajithia007@gmail.com'),
(20170681, 'TE', 31, 'IT', 'DT2', 'MAKWANA ARYA BHAVESH KETKI', 9324004008, 'arya.makwana@somaiya.edu', 9022808988, 'bhaveshmak@hotmail.com'),
(20170756, 'TE', 32, 'IT', 'DT2', 'MANCHEKAR OMKAR ASHOK ASHWINI', 9819182405, 'omkar.manchekar@somaiya.edu', 9426888403, 'manashok@rediffmail.com'),
(20170141, 'TE', 33, 'IT', 'DT2', 'MANIAR PARTH DILIP BINA', 8692047749, 'parthdmaniar2001@gmail.com', 9869400573, 'ddmaniar@gmail.com'),
(20170247, 'TE', 34, 'IT', 'DT2', 'MARU SAJ BHAVESH MEENA', 9920177347, 'saj.maru@somaiya.edu', 9869008209, 'bhaveshmaru20@gmail.com'),
(20170858, 'TE', 35, 'IT', 'DT2', 'MEHTA KHUSHBOO KAMLESH TRUPTI', 9321126507, 'khushboo.km@somaiya.edu', 9820041862, 'kammehta04@yahoo.co.uk'),
(20171013, 'TE', 36, 'IT', 'DT2', 'MISHRA SAHIL SAMEER RAKHI', 9820035133, 'sahil.mishra1@somaiya.edu', 9967787466, 'sammymishra69@gmail.com'),
(20170933, 'TE', 37, 'IT', 'DT2', 'MISRI AMAN ASHWANI SARLA', 8716961291, 'aman.misri@somaiya.edu', 9419203510, 'ashwanimisri55@gmail.com'),
(20171295, 'TE', 38, 'IT', 'DT2', 'MORE ANUJ CHANDRAKANT ASHWINI', 8097277679, 'anuj.more@somaiya.edu', 9869365885, 'chandrakantmore1669@gmail.com'),
(20171619, 'TE', 39, 'IT', 'DT2', 'NAGDA LUY LINESH PRAGNYA', 9870676203, 'luy.n@somaiya.edu', 9323276135, 'linesh.lngrp@gmail.com'),
(20171254, 'TE', 40, 'IT', 'DT2', 'NAGDA YASH HITESH SHITAL', 9022182182, 'yash.hn@somaiya.edu', 9892185205, 'yash.nagda8@gmail.com'),
(20170613, 'TE', 41, 'IT', 'DT2', 'NAIK AMAY RAVINDRA SUPRITA', 7977571987, 'amay.naik@somaiya.edu', 9819229891, 'n.ravindra42@yahoo.com'),
(20170758, 'TE', 42, 'IT', 'DT3', 'NAIK REVAA RAJESH RASHMI', 9820988602, 'revaa.naik@somaiya.edu', 9820067345, 'impressmarketing12@gmail.com'),
(20170685, 'TE', 43, 'IT', 'DT3', 'PANDEY MAYURESH PRAMOD REETA', 9167057174, 'mayuresh.pandey@somaiya.edu', 9930269899, 'pandeypramod782@gmail.com'),
(20171531, 'TE', 44, 'IT', 'DT3', 'PATEL AKASH RAJESHBHAI KAILASBEN', 8108202809, 'akash.rp@somaiya.edu', 9029514754, 'pkamal908@gmail.com'),
(20171545, 'TE', 45, 'IT', 'DT3', 'PATEL DEVANG SURESH ILA', 8356093930, 'devang.sp@somaiya.edu', 9322286032, 'devangpatel8098@gmail.com'),
(20171067, 'TE', 46, 'IT', 'DT3', 'RAMOLA PRADEEP TRILOK SHANTI', 7045327591, 'pradeep.ramola@somaiya.edu', 9867853019, 'pradeepramola320@gmail.com'),
(20170299, 'TE', 47, 'IT', 'DT3', 'SANDBHOR RITESH SANJAY VIDYA', 9167703475, 'ritesh.sandbhor@somaiya.edu', 8888741000, 'sanjaysandbhor440@gmail.com'),
(20171668, 'TE', 48, 'IT', 'DT3', 'SHAH BHAVYA RAJESH MAMTA', 7045905332, 'shah.br@somaiya.edu', 9820775330, 'pooja.r.shah17@gmail.com'),
(20170542, 'TE', 49, 'IT', 'DT3', 'SHAH KRUPA PARESH DAKSHITA', 8879260002, 'krupa04@somaiya.edu', 9820201521, 'pareshshah186@gmail.com'),
(20170122, 'TE', 50, 'IT', 'DT3', 'SHAH SMIT MAYANK CHETNA', 7045591602, 'smit16@somaiya.edu', 9167399725, 'mayank73@gmail.com'),
(20170910, 'TE', 51, 'IT', 'DT3', 'SHARMA PANKAJ KUMAR KIRPA RAM RANI', 9619840939, 'kirparsharma@gmail.com', 8509601425, 'kirparsharma@gmail.com'),
(20171407, 'TE', 52, 'IT', 'DT3', 'SHASTRI RHEA DILIP ASHA', 8169158650, 'rhea.shastri@somaiya.edu', 9987962662, 'dipasha@vsnl.com'),
(20171059, 'TE', 53, 'IT', 'DT3', 'SHETH DHAIRYA AMIT MALTI', 9702050675, 'dhairya.sheth@somiaya.edu', 9702908148, 'amitsheth@hotmail.co.in'),
(20170544, 'TE', 54, 'IT', 'DT3', 'SHETTY SHREYA SATISH REKHA', 9833552111, 'shreya03@somaiya.edu', 9322406498, 's_nshetty@yahoo.co.in'),
(20170855, 'TE', 55, 'IT', 'DT3', 'SHEWALE NEHA LAXMAN NIRMALA', 8652369154, 'neha.shewale@somaiya.edu', 9322361154, 'laxmandaji@gmail.com'),
(20171051, 'TE', 56, 'IT', 'DT3', 'SINGH RAHUL RAJESH SARITA', 9619640601, 'rahul.singh3@somaiya.edu', 9969573383, 'rksbarc@rediffmail.com'),
(20170463, 'TE', 57, 'IT', 'DT3', 'SINGH SHREYA SHAILESH KUMAR PUSHPA', 9867212950, 'shreya.ks@somaiya.edu', 9867583063, 'pushpa.sumitra@gmail.com'),
(20170865, 'TE', 59, 'IT', 'DT3', 'THAKUR SHATAYU SUNIL VANDANA', 9819572972, 'shatayu.t@somaiya.edu', 9820340855, 'sunilwankhede@yahoo.com'),
(20170177, 'TE', 60, 'IT', 'DT3', 'VALLAKATI NAGRAJ VENKATESHAM TEJASHREE', 9819600352, 'nagraj.v@somaiya.edu', 9833500352, 'venkatesh1107@gmail.com'),
(20171595, 'TE', 61, 'IT', 'DT3', 'VORA CHINTAN HIMANSHU ALPA', 8983443606, 'c.vora@somaiya.edu', 9619880537, 'hvora2000@gmail.com'),
(20170851, 'TE', 62, 'IT', 'DT3', 'VORA VIRAJ JAYESH SHILPA', 9167694116, 'viraj.v@somaiya.edu', 9820884561, 'shilpashah561@gmail.com'),
(20160158, 'TE', 63, 'IT', 'DT3', 'MAROLIKAR DIVYA KISHORKUMAR HEMLATA', 9082450826, 'divya.marolikar@somaiya.edu', 7208412723, 'divya.marolikar123@gmail.com'),
(0, 'TE', 64, 'IT', 'DT4', 'SAWALKAR ABHISHEK DATTA SHOBHA', 9870175006, 'a.sawalkar@somaiya.edu', 8779159790, 'abhishek.savalkar70@gamil.com'),
(20160159, 'TE', 65, 'IT', 'DT4', 'PATEL YASH HITESH BHAVNA', 8779562688, 'yash21@somaiya.edu', 9821714551, ''),
(20170292, 'TE', 66, 'IT', 'DT1', 'JAGDALE ANUSHKA SUKHDEV SHOBHA', 9987124852, 'anushka.jagdale@somaiya.edu', 9892354852, 'hbhor@live.com'),
(20180012, 'TE', 67, 'IT', 'DT4', 'GOHIL JAI KISHOR PUSHPA', 9757433755, 'jai.gohil@somaiya.edu', 9819403032, 'pushpakishor1975@gmail.com'),
(20180004, 'TE', 68, 'IT', 'DT4', 'GOHIL ZEEL DHIRAJ SONAL', 9757463439, 'zeel.gohil@somaiya.edu', 9221734059, 'dhirajgohil.dg@gmail.com'),
(20180007, 'TE', 69, 'IT', 'DT4', 'GOSALIA VISHWA SANJAY NEHA', 8080134037, 'vishwa.gosalia@somaiya.edu', 9757289402, 'nehagosalia123@gmail.com'),
(20180066, 'TE', 70, 'IT', 'DT4', 'JASWANI AASHUTOSH RAMESH ASHA', 8888758512, 'aashutosh.j@somaiya.edu', 9271717950, 'aakansha20@gmail.com'),
(20180005, 'TE', 71, 'IT', 'DT4', 'MANDAVKAR SNEHAL SUBHASH JAYSHREE', 8291536419, 'snehal.mandavkar@somaiya.edu', 9323226614, 'jayshree.mandavkar@gmail.com'),
(20180064, 'TE', 72, 'IT', 'DT4', 'MORE SAHIL SATAPPA SANJANA', 8412985818, 'sahil.more2@somaiya.edu', 9421289538, 'sanjaymore.more1970@gmail.com'),
(20180016, 'TE', 73, 'IT', 'DT4', 'PANCHAL DAKSHESH VINOD PRERNA', 9594562010, 'dakshesh.vp@somaiya.edu', 9867072594, 'panchalvinod360@gmail.com'),
(20180003, 'TE', 74, 'IT', 'DT4', 'PARMAR DHRUV KIRAN ANITA', 7045601556, 'dhruv.kp@somaiya.edu', 9820023749, 'anita1974@gmail.com'),
(20180010, 'TE', 75, 'IT', 'DT4', 'PATIL PRAGALBHA SHRIKANT ANKITA', 9867164614, 'pragalbha.p@somaiya.edu', 9004295658, 'patilshri69@gmail.com'),
(20180008, 'TE', 76, 'IT', 'DT4', 'SAPARIYA DIVYESH KETAN JYOTI', 7506811519, 'divyesh.sapariya@somaiya.edu', 9820106101, 'k.sapariya12@gail.com'),
(20180013, 'TE', 77, 'IT', 'DT4', 'SHINDE PRIYANKA PANDURANG MANISHA', 7798029846, 'priyanka20@somaiya.edu', 9920641148, ''),
(20160381, 'TE', 79, 'IT', 'DT4', 'PATOLE KAILAS CHANDRAKANT VARSHA', 9869720886, 'kailas.patole@somaiya.edu', 8779851814, 'patolekailas7@gmail.com'),
(20160143, 'TE', 81, 'IT', 'DT4', 'PATIL PIYUSH BABASO SULAKSHANA', 7045094436, 'piyush.bp@somaiya.edu', 9769485686, 'piyushbpatil123@gmail.com'),
(20160176, 'TE', 82, 'IT', 'DT4', 'VARIYA HARDIK PRAVINBHAI SAKARBEN', 7021863802, 'hardik.variya@somaiya.edu', 9029541855, 'hardikvariya98@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
