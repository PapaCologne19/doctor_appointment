-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 08:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_date_start` date NOT NULL,
  `appointment_date_end` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `appointment_status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `ID` int(11) NOT NULL,
  `LAST_NAME` varchar(512) DEFAULT NULL,
  `MIDDLE_NAME` varchar(512) DEFAULT NULL,
  `FIRST_NAME` varchar(512) DEFAULT NULL,
  `SUFFIX` varchar(512) DEFAULT NULL,
  `GENDER` varchar(512) DEFAULT NULL,
  `MOBILE_NUMBER` varchar(512) DEFAULT NULL,
  `ID_NUMBER` varchar(512) DEFAULT NULL,
  `track` varchar(20) NOT NULL,
  `divisionnya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`ID`, `LAST_NAME`, `MIDDLE_NAME`, `FIRST_NAME`, `SUFFIX`, `GENDER`, `MOBILE_NUMBER`, `ID_NUMBER`, `track`, `divisionnya`) VALUES
(1, 'ABELLO', 'TORRES', 'JULIETO', '', 'MALE', '0923-746-92-26', 'PCN150', '1', 'BSG'),
(2, 'CORREA', 'HERNANDO', 'MARK ANTHONY', '', 'MALE', '0946-002-3309', 'PCN292', '1', 'FINANCE'),
(3, 'ADIAO', 'OFEMIA', 'CHRISTOPHER', '', 'MALE', '0905-325-66-67', 'PCN303', '1', 'BD3'),
(4, 'ADIAO', 'OFEMIA', 'PAULA LYN', '', 'FEMALE', '0927-763-5366', 'PCN402', '1', 'BD1'),
(5, 'ASEBIAS', 'GATON', 'LIZA', '', 'FEMALE', '0930-359-9170', 'PCN379', '1', 'BD1'),
(6, 'AGUILAR', 'LUZ', 'DITAS', '', 'FEMALE', '0956-594-36-48', 'PCN318', '1', 'HRD'),
(7, 'ALMANZOR', 'MUÑEZ', 'JOSEPH', 'JR.', 'MALE', '0966-442-6995', 'PCN185', '1', 'BD3'),
(8, 'ALVAREZ', 'LAPORE', 'DAISY', '', 'FEMALE', '0927-685-20-20', 'PCN195', '1', 'BD2'),
(9, 'AMORES', 'SABERON', 'ALMA', '', 'FEMALE', '0920-460-6269', 'PCN86', '', 'BD3'),
(10, 'ANTIPALA', 'GUERRERO', 'DIXIE', '', 'FEMALE', '0955-546-98-24', 'PCN181', '1', 'BD2'),
(11, 'GUADIZ', 'QUILANG', 'APRIL', '', 'FEMALE', '0961-762-8673', 'PCN382', '1', 'FINANCE'),
(12, 'ARELLANO', 'AVILA', 'AIZA', '', 'FEMALE', '0948-907-13-29', 'PCN291', '1', 'HRD'),
(13, 'AVILA', 'CJUAN', 'HERBILYN', '', 'FEMALE', '0932-705-00-03', 'PCN268', '1', 'BD1'),
(14, 'VILLARUEL', 'SALANSAN', 'SHAIDHEL', '', 'FEMALE', '0931-860-5864', 'PCN411', '1', 'FINANCE'),
(15, 'BALARAO', 'ROMANO', 'RUBILYN', '', 'FEMALE', '0950-458-60-31', 'PCN274', '', 'BD1'),
(16, 'BARRIOS', 'ESPINA', 'ROBERT', '', 'MALE', '0961-062-6490', 'PCN366', '1', 'BD1'),
(17, 'CABACIS', 'DESTURA', 'CHRISTOPHER', '', 'MALE', '0908-740-36-39', 'PCN149', '1', 'BD1'),
(18, 'BAESA', 'CUSTODIO', 'HERMONIDES', '', 'MALE', '0922-889-52-37', 'PCN16', '1', 'PPI'),
(19, 'BALADJAY', 'CALISIN', 'MA. LEONORA', '', 'FEMALE', '0921-647-08-64', 'PCN63', '1', 'BSG'),
(20, 'CABRERA', 'SEJAS', 'JEFFREY', '', 'MALE', '0995-977-26-06', 'PCN358', '1', 'BD1'),
(21, 'BARDE', 'GONZAGA', 'ELIZABETH', '', 'FEMALE', '0935-527-61-94', 'PCN220', '1', 'BSG'),
(22, 'BARRAMEDA', 'MANSANADEZ', 'JONATHAN', '', 'MALE', '0922-855-85-74', 'PCN7', '1', 'BSG'),
(23, 'BARRAZONA', 'STREBEL', 'RUBY ROSE', '', 'FEMALE', '0925-504-87-00', 'PCN137', '1', 'BD3'),
(24, 'CARALDE', 'PALATINO', 'MARIAH JANNELLE', '', 'FEMALE', '0920-322-5630', 'PCN395', '1', 'BD1'),
(25, 'ADANO', 'RAMOS', 'GERALD', '', 'MALE', '0916-432-3587', 'PCN373', '1', 'FINANCE'),
(26, 'BATACLAN', 'ARANETA', 'EARL DENNIS', '', 'MALE', '0929-329-9329', 'PCN374', '1', 'BD2'),
(27, 'BEDIS', '', 'MATT HARRIS', '', 'MALE', '0966-267-9578', 'PCN401', '1', 'STRAT'),
(28, 'AQUINO', 'AGBUNAG', 'RACHELLE', '', 'FEMALE', '0999-534-9036', 'PCN387', '1', 'FINANCE'),
(29, 'ASAGRA', 'GERNATE', 'CLARIZA', '', 'FEMALE', '0916-244-73-74', 'PCN285', '1', 'FINANCE'),
(30, 'BARTOLOME', 'VERGARA', 'CLOVEN', 'JR.', 'MALE', '0918-477-49-80', 'PCN376', '1', 'FINANCE'),
(31, 'BERNAS', 'DIMAILIG', 'MARY JOYCE', '', 'FEMALE', '0977-802-2260', 'PCN410', '1', 'BD1'),
(32, 'BINUYA', 'SINGSON', 'REY FERDINAND', '', 'MALE', '', 'PCN1', '1', 'EXECOM'),
(33, 'BELDAD', 'MILLANTE', 'MA. CHRISTINA', '', 'FEMALE', '0939-100-99-51', 'PCN107', '1', 'FINANCE'),
(34, 'BONIFACIO', 'MACABASAG', 'CONRADO', 'JR.', 'MALE', '0927-987-60-66', 'PCN315', '', 'BD2'),
(35, 'BELTRAN', 'ARAMBULO', 'JAY-AR', '', 'MALE', '0947-690-18-60', 'PCN236', '1', 'FINANCE'),
(36, 'BURCE', 'MOLAS', 'MICHAEL', '', 'MALE', '0949-948-55-44', 'PCN45', '', 'STRAT'),
(37, 'CARLOS', 'MEDINA', 'JELLIE ANNE', '', 'FEMALE', '0917-600-8791', 'PCN273', '', 'BD1'),
(38, 'CABANGIS', 'NOMBRA', 'RICHARD', '', 'MALE', '0918-760-3990', 'PCN398', '1', 'HRD'),
(39, 'COÑADO', 'MARTINEZ', 'MIE', '', 'FEMALE', '0919-371-7537', 'PCN43', '1', 'BD1'),
(40, 'CAINGAT', 'CALIMLIM', 'JOANLYN', '', 'FEMALE', '0977-176-28-51', 'PCN254', '1', 'BD2'),
(41, 'CAMET', 'JURILLA', 'SHIELA MARIE', '', 'FEMALE', '0975-238-1435', 'PCN403', '', 'BD2'),
(42, 'DELA PASION', 'INTAL', 'MARY GRACE', '', 'FEMALE', '0916-777-56-43', 'PCN127', '1', 'BD1'),
(43, 'CARINO', 'VILLACORTE', 'EDUARDO', 'JR.', 'MALE', '0925-302-82-58', 'PCN70', '1', 'BSG'),
(44, 'FORCADILLA', 'GACIS', 'RUBY', '', 'FEMALE', '0935-818-04-09', 'PCN266', '1', 'BD1'),
(45, 'CARITATIVO', 'MANUEL', 'RODERICK', '', 'MALE', '', 'PCN23', '1', 'BD2'),
(46, 'GALANG', 'ABULENCIA', 'DENISE ARIANNE', '', 'FEMALE', '0919-995-82-91', 'PCN194', '1', 'BD1'),
(47, 'CASTILLO', 'GARCIA', 'BRYAN', '', 'MALE', '0908-784-05-23', 'PCN284', '1', 'STRAT'),
(48, 'CASTILLO', 'TORIO', 'LUMIN', '', 'FEMALE', '0933-414-0855', 'PCN384', '', 'BD2'),
(49, 'CATUNGAL', 'PALMA', 'REYMOND', '', 'MALE', '0933-818-21-37', 'PCN66', '1', 'BSG'),
(50, 'CEDULA', 'QUIZON', 'EDWIN', '', 'MALE', '0915-341-80-60', 'PCN290', '1', 'BD2'),
(51, 'CENDAÑA', 'DE GUZMAN', 'RICHVON', '', 'MALE', '0995-824-57-47', 'PCN198', '1', 'BD2'),
(52, 'BERNAS', 'BALANDANG', 'JHON REY', '', 'MALE', '0945-972-74-62', 'PCN205', '1', 'FINANCE'),
(53, 'CO', 'BAYOT', 'ARIEL', '', 'MALE', '0917-551-69-67', 'PCN312', '1', 'HRD'),
(54, 'GERILLA', 'DINGDING', 'KHRISNA', '', 'FEMALE', '0939-428-4322', 'PCN407', '1', 'BD1'),
(55, 'COROZA', 'MENDOZA', 'HERENZO', '', 'MALE', '0935-697-4346', 'PCN296', '1', 'STRAT'),
(56, 'BONGAY', 'CABACUNGAN', 'JESSICA', '', 'FEMALE', '0925-504-86-92', 'PCN64', '1', 'FINANCE'),
(57, 'CORTEZ', 'LABINE', 'MICHAEL', '', 'MALE', '0917-838-1257', 'PCN46', '1', 'BD2'),
(58, 'DAYO', 'ANDRES', 'JOEL', '', 'MALE', '0932-850-8824', 'PCN72', '1', 'BSG'),
(59, 'DAYRIT', 'FRANCISCO', 'CHRISTINE JANE', '', 'FEMALE', '0977-096-4591', 'PCN393', '1', 'HRD'),
(60, 'DE CASTRO', 'PALMERO', 'VERONICA', '', 'FEMALE', '0922-889-51-92', 'PCN4', '1', 'BSG'),
(61, 'BUISER', 'CASTILLO', 'SIMONET', '', 'FEMALE', '0925-504-86-91', 'PCN100', '1', 'FINANCE'),
(62, 'DE LEON', 'PEDRGOZA', 'EDWARD', '', 'MALE', '0932-315-87-99', 'PCN73', '1', 'BSG'),
(63, 'DEL MUNDO', 'REVILLA', 'RODANTE', '', 'MALE', '0922-855-85-76', 'PCN14', '', 'BSGX'),
(64, 'INCOY', 'ORAYE', 'ALEXANDER', '', 'MALE', '0933-609-0277', 'PCN368', '1', 'BD1'),
(65, 'DEL ROSARIO', 'CANLAS', 'RODOLFO', '', 'MALE', '', 'PCN74', '1', 'BSG'),
(66, 'CHAVEZ', 'TUSI', 'RUBENA KRISNA', '', 'FEMALE', '0956-132-5146', 'PCN309', '1', 'FINANCE'),
(67, 'DELA CRUZ', 'SARMIENTO', 'ROSALYN', '', 'FEMALE', '0925-302-81-97', 'PCN177', '1', 'BD3'),
(68, 'MARALIT', 'GARCIA', 'DIANNE MARICRIS', '', 'FEMALE', '0921-572-55-00', 'PCN257', '1', 'BD1'),
(69, 'DELA ROSA', 'MALUTO', 'CHRISTIAN', '', 'MALE', '0925-300-27-80', 'PCN261', '1', 'BD3'),
(70, 'DE GUIA', 'OLBES', 'JOAN', '', 'FEMALE', '0917-837-87-79', 'PCN389', '1', 'FINANCE'),
(71, 'ORMACIDO', 'INGCO', 'ANGELICA', '', 'FEMALE', '0916-782-47-78', 'PCN281', '1', 'BD1'),
(72, 'DELA CRUZ', 'CAPPAROS', 'DARWIN', '', 'MALE', '0956-873-78-71', 'PCN307', '1', 'FINANCE'),
(73, 'DORADO', 'GREGORY', 'RONALD', '', 'MALE', '0922-898-54-11', 'PCN168', '1', 'BSG'),
(74, 'DELUSO', 'BENID', 'RICAREDO', 'JR.', 'MALE', '0946-298-40-75', 'PCN265', '1', 'FINANCE'),
(75, 'DUNGARAN', 'ABAD', 'MARIVIC', '', 'FEMALE', '0932-332-6745', 'PCN259', '1', 'BSG'),
(76, 'ESGUERRA', 'ALVENDIA', 'ALICIA', '', 'FEMALE', '0923-745-97-61', 'PCN131', '', 'BD3'),
(77, 'ESMALDE', 'LARA', 'ROCHE', '', 'FEMALE', '0920-320-65-68', 'PCN361', '1', 'HRD'),
(78, 'ESTROBO', 'NECESITO', 'RAYMOND', '', 'MALE', '0921-424-35-49', 'PCN164', '1', 'BSG'),
(79, 'FERRER', 'BELANDRES', 'ROMEL', '', 'MALE', '0922-811-35-31', 'PCN101', '1', 'BSG'),
(80, 'FONTANILLA', 'GUBA', 'ALBERTO', '', 'MALE', '0932-852-11-37', 'PCN97', '1', 'PPI'),
(81, 'PASCUA', 'DIAZ', 'PAMELA LYN', '', 'FEMALE', '0933-149-8649', 'PCN400', '1', 'BD1'),
(82, 'FORMARAN', 'CRUZ', 'JOSHUA', '', 'MALE', '0935-647-31-00', 'PCN334', '1', 'HRD'),
(83, 'FUENTES', 'VILLAMENTE', 'PATRICIA MAE', '', 'FEMALE', '0925-504-87-02', 'PCN179', '1', 'HRD'),
(84, 'DORADO', 'GREGORY', 'ROMMEL', '', 'MALE', '0921-463-1076', 'PCN388', '1', 'FINANCE'),
(85, 'SALTA', 'MANTALA', 'JULIE ANN', '', 'FEMALE', '0976-034-6388', 'PCN370', '1', 'BD1'),
(86, 'DUMALUAN', '', 'MARIE', '', 'MALE', '0939-401-19-69', 'PCN206', '1', 'FINANCE'),
(87, 'GARCIA', 'BALARAO', 'REYCHELYN', '', 'FEMALE', '0907-209-4440', 'PCN297', '1', 'BD2'),
(88, 'GENOVA', 'DE VERA', 'SHELAH MEL', '', 'FEMALE', '0925-504-86-99', 'PCN998', '1', 'PPI'),
(89, 'VARGAS', 'SERA', 'KAREN', '', 'FEMALE', '0999-769-71-54', 'PCN193', '1', 'BD1'),
(90, 'GOMEZ', 'GEROSANO', 'WILLIAM PATRICK', '', 'MALE', '0932-854-79-69', 'PCN112', '1', 'BSG'),
(91, 'GONZALES', 'OLBES', 'LESLIE ANN', '', 'FEMALE', '0919-995-82-91', 'PCN362', '1', 'HRD'),
(92, 'FUGABAN', 'GUZMAN', 'JEILA MARIE', '', 'FEMALE', '0906-424-09-04', 'PCN207', '1', 'FINANCE'),
(93, 'ILAGAN', 'SARAZA', 'JOSEPHINE', '', 'FEMALE', '', 'PCN75', '1', 'BD2'),
(94, 'AGABIN', 'ZARATE', 'ZHA-ZHA', '', 'FEMALE', '0961-514-89-59', 'PCN354', '1', 'BD1'),
(95, 'ARELLANO', 'AVILA', 'JENNY', '', 'FEMALE', '0920-217-13-81', 'PCN138', '1', 'BD1'),
(96, 'JIMENA', 'BORBE', 'MARY ROSE', '', 'FEMALE', '0919-394-7307', 'PCN306', '1', 'HRD'),
(97, 'JOMOCAN', 'ABQUILAN', 'MARY MANALIT', '', 'FEMALE', '0922-811-34-91', 'PCN111', '1', 'BD3'),
(98, 'JOVES', 'ACEJO', 'SHARMAINE', '', 'FEMALE', '0977-463-1941', 'PCN365', '1', 'HRD'),
(99, 'LABASAN', 'OCHOA', 'NOEL', '', 'MALE', '0916-913-41-51', 'PCN304', '1', 'HRD'),
(100, 'LAGROSA', 'BALILI', 'JOAN', '', 'MALE', '0995-733-59-99', 'PCN77', '1', 'BSG'),
(101, 'LICSI', 'GUEVARA', 'MANUEL', '', 'MALE', '0922-878-06-22', 'PCN2', '1', 'EXECOM'),
(102, 'GARCIA', 'BARCOMA', 'CHERRY ANN', '', 'FEMALE', '0927-003-69-79', 'PCN208', '1', 'FINANCE'),
(103, 'LOPEZ', 'SANTOS', 'IRMINA', '', 'FEMALE', '0922-889-50-52', 'PCN24', '1', 'BD2'),
(104, 'LOPEZ', 'MIRANDA', 'PAUL RINGO', '', 'MALE', '0916-600-87-64', 'PCN180', '1', 'HRD'),
(105, 'LIPAT', 'DUMA', 'FLORDELIZA', '', 'FEMALE', '0950-333-91-57', 'PCN211', '1', 'FINANCE'),
(106, 'LUCENA', 'REODAVA', 'RACIELLE ANNE', '', 'FEMALE', '0917-954-2841', 'PCN396', '1', 'BD2'),
(107, 'LUCENA', '', 'REINA ROSE', '', 'FEMALE', '0910-575-1987', 'p', '1', 'HRD'),
(108, 'AYOP', 'MACARAYAN', 'MANELYN', '', 'FEMALE', '0927-405-50-51', 'PCN356', '1', 'BD1'),
(109, 'MAGNO', 'REYES', 'RICHARD', '', 'MALE', '0935-572-55-80', 'PCN93', '1', 'BD2'),
(110, 'DIMAILIG', 'FLORES', 'RHODORA', '', 'FEMALE', '0933-291-00-97', 'PCN258', '1', 'BD1'),
(111, 'MARCA', 'FONTANILLA', 'NANCY', '', 'FEMALE', '0917-532-45-17', 'PCN3', '1', 'BD3'),
(112, 'MASCARINA', 'FLORES', 'VERA ELLEN', '', 'FEMALE', '0916-511-31-99', 'PCN244', '1', 'HRD'),
(113, 'MENDOZA', 'JUAREZ', 'JERICK', '', 'MALE', '0936-513-13-89', 'PCN202', '1', 'BD2'),
(114, 'MENDOZA', 'ABUTOG', 'MOLLY', '', 'FEMALE', '0942-516-78-87', 'PCN264', '1', 'BD2'),
(115, 'MIRANDA', 'PAEZ', 'JHOANNA', '', 'FEMALE', '0917-123-87-53', 'PCN187', '1', 'BSG'),
(116, 'LUCENA', 'REODAVA', 'LEA ANNE', '', 'FEMALE', '0927-037-2603', 'PCN390', '1', 'FINANCE'),
(117, 'MOTEL', 'SALAZAR', 'PALOMA LARIZA', '', 'FEMALE', '0927-279-75-70', 'PCN85', '1', 'BD2'),
(118, 'ODTUHAN', 'MORALITA', 'JEFFREY', '', 'MALE', '0923-369-29-48', 'PCN277', '1', 'BSG'),
(119, 'OLIVA', 'DE LEON', 'AILEEN', '', 'FEMALE', '0933-818-21-40', 'PCN55', '1', 'STRAT'),
(120, 'INOCENCIO', 'REBENITO', 'CHARMAINE', '', 'FEMALE', '0916-698-17-87', 'PCN283', '1', 'BD1'),
(121, 'PAMILARAN', 'MELLEVO', 'ZENAIDA', '', 'FEMALE', '0965-386-77-82', 'PCN173', '1', 'HRD'),
(122, 'PANG', '', 'ALEXANDER', '', 'MALE', '', 'PCN1007', '', 'STRAT'),
(123, 'MADRIAGA', 'PALMA', 'JAYSON', '', 'MALE', '0961-523-9004', 'PCN405', '1', 'BD1'),
(124, 'PASIA', 'DELA PAZ', 'RONNEL', '', 'MALE', '0917-846-0720', 'PCN12', '', 'FINANCE'),
(125, 'PASIA', 'PAYNOR', 'SHERYL', '', 'FEMALE', '0917-860-72-76', 'PCN13', '1', 'BD1'),
(126, 'PAULINO', 'MASANGQUE', 'MARIA PAULA LUZ', '', 'FEMALE', '0916-789-22-87', 'PCN350', '1', 'BD3'),
(127, 'MONTERO', 'PUREZA', 'ANNA SHIELA', '', 'FEMALE', '0925-504-8705', 'PCN118', '1', 'FINANCE'),
(128, 'PESIGAN', 'DIMAILIG', 'AILEEN', '', 'FEMALE', '0916-515-80-86', 'PCN27', '1', 'BD1'),
(129, 'POLICARPIO', 'MANANSALA', 'ABIGAEL', '', 'FEMALE', '0995-172-6788', 'PCN408', '1', 'HRD'),
(130, 'QUIMNO', 'MANOBA', 'CHRISTIAN CEASAR', '', 'MALE', '0917-347-24-17', 'PCN349', '1', 'BSG'),
(131, 'RAMOS', 'SANTOS', 'FERNANDO', '', 'MALE', '0920-916-31-41', 'PCN176', '1', 'STRAT'),
(132, 'RAMOS', 'CANDAZA', 'FREDERICK', '', 'MALE', '0922-889-53-02', 'PCN42', '1', 'BD2'),
(133, 'SALAZAR', 'OLAYVAR', 'ANDREW', '', 'MALE', '0956-854-51-03', 'PCN167', '1', 'BD3'),
(134, 'SOLIMAN', '', 'MA. CRISTINA', '', 'FEMALE', '0927-414-28-34', 'PCN282', '', 'BD1'),
(135, 'SIBAY', 'SINADJAN', 'ROXAN', '', 'FEMALE', '0928-802-38-30', 'PCN353', '', 'BD2'),
(136, 'TORRE', 'RAMOS', 'JOYCE MARICK', '', 'FEMALE', '0995-866-95-42', 'PCN174', '1', 'BD1'),
(137, 'SORIANO', 'PAYUMO', 'RONALD', '', 'MALE', '0922-855-84-95', 'PCN35', '1', 'BD2'),
(138, 'TABUENA', 'DEQUITO', 'JERALDINE', '', 'FEMALE', '0905-493-1014', 'PCN385', '1', 'BD3'),
(139, 'TEVAR', 'COSTALES', 'FERISH', '', 'MALE', '0917-624-19-15', 'PCN122', '1', 'HRD'),
(140, 'TOMENIO', 'DOMASIG', 'MA. REYNA', '', 'FEMALE', '0907-292-2300', 'PCN409', '1', 'HRD'),
(141, 'CARINO', 'REVILLA', 'GEORGE MICHAEL', '', 'MALE', '0917-832-10-92', 'PCN184', '1', 'BD1'),
(142, 'PEREDA', 'VILLEGAS', 'MARLUDETH', '', 'FEMALE', '0925-504-86-96', 'PCN17', '1', 'FINANCE'),
(143, 'VELASCO', 'EVANGELISTA', 'ADRIAN', '', 'MALE', '0923-742-56-04', 'PCN82', '1', 'BSG'),
(144, 'VELASCO', 'EVANGELISTA', 'EDUARDO', '', 'MALE', '0933-818-21-38', 'PCN11', '1', 'BSG'),
(145, 'VERDE', 'DELIZO', 'MA. FE', '', 'FEMALE', '0908-381-11-22', 'PCN216', '1', 'HRD'),
(146, 'VILLANUEVA', 'ISLA', 'FERNANDO', '', 'MALE', '0922-889-52-67', 'PCN83', '1', 'BSG'),
(147, 'DEL ROSARIO', 'BALADJAY', 'JOAN', '', 'FEMALE', '0960-868-1812', 'PCN286', '1', 'BSG'),
(148, 'VILLASOR', 'CAAGBAY', 'CEFERINA', '', 'FEMALE', '0907-161-8248', 'PCN160', '', 'BD3'),
(149, 'VILLAVICENCIO', 'MIRARAN', 'JUNALIE', '', 'FEMALE', '0932-852-11-35', 'PCN121', '1', 'FINANCE'),
(150, 'VILLAVICENCIO', 'DE GUZMAN', 'RODEO', '', 'MALE', '0947-809-38-14', 'PCN40', '1', 'STRAT'),
(151, 'VILLOSA', 'CARANDANG', 'BENJAMIN', '', 'MALE', '0942-573-41-63', 'PCN134', '', 'BD3'),
(152, 'ZAFRA', 'ROSAL', 'FERDINAND', '', 'MALE', '0929-832-14-98', 'PCN29', '1', 'BD3'),
(153, 'BAGABAY', '', 'CESAR', '', 'MALE', '', 'PCN1008', '', 'BSG'),
(154, 'PELAYO', '', 'ANAMIE', '', 'FEMALE', '', 'PCN1010', '1', 'STRAT'),
(155, 'GOMERA', 'AMANTE', 'JAMES PHILIP', '', 'MALE', '0910-146-5183', 'PCN191881', '', 'STRATX'),
(156, 'JONES', 'ALDE', 'SHANAIAH ISABELLE', '', 'FEMALE', '0917-790-2004', 'PCN191886', '', 'STRATX'),
(157, 'TOMENIO', '', 'MARIA REYNA', '', 'FEMALE', '', 'PCNTEMP01', '', 'BD1'),
(158, 'EVANGELISTA', '', 'EVA', '', 'FEMALE', '', 'PCNTEMP02', '', 'BD1'),
(159, 'VILLASANTA', 'DIAZ', 'ERNESTO', 'JR.', 'MALE', '0906-364-45-94', 'PCN191882', '', 'STRATX');

-- --------------------------------------------------------

--
-- Table structure for table `pre_hospital_info`
--

CREATE TABLE `pre_hospital_info` (
  `id` int(11) NOT NULL,
  `info_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nature_of_incident` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_of_incident` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transfer_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_vac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companion_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companion_contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companion_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companion_relationship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `initial_impression` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chief_complaint` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symptoms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allergy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `past_medical_history` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_oral_intake` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_leading_to_injury` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medical_condition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oxygenation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `glasgow_coma_scale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assessment_narative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `treatment_applied` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `safety_marshal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endorsed_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bp1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bp2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bp3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bp4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bp5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rr1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rr2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rr3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rr4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rr5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pre_hospital_info`
--

INSERT INTO `pre_hospital_info` (`id`, `info_date`, `info_time`, `info_location`, `nature_of_incident`, `type_of_incident`, `transfer_info`, `patient_firstname`, `patient_middlename`, `patient_lastname`, `patient_age`, `patient_gender`, `patient_status`, `patient_address`, `patient_vac`, `companion_name`, `companion_contact_number`, `companion_address`, `companion_relationship`, `initial_impression`, `chief_complaint`, `symptoms`, `allergy`, `medication`, `past_medical_history`, `last_oral_intake`, `events_leading_to_injury`, `loc`, `medical_condition`, `oxygenation`, `glasgow_coma_scale`, `assessment_narative`, `treatment_applied`, `safety_marshal`, `endorsed_to`, `bp1`, `bp2`, `bp3`, `bp4`, `bp5`, `pr1`, `pr2`, `pr3`, `pr4`, `pr5`, `rr1`, `rr2`, `rr3`, `rr4`, `rr5`, `temp1`, `temp2`, `temp3`, `temp4`, `temp5`, `os1`, `os2`, `os3`, `os4`, `os5`) VALUES
(1, '2023-11-17', '16:31', 'location', 'FIRE', 'TRAUMA', 'YES', 'patient name', 'middle', 'lastname', '44', 'Male', 'SINGLE', 'sdf', 'YES', 'companion', '063', 'address companion', 'com relation', 'init', 'chief com', 'systom', 'allergy', 'medication', 'past medical', 'last oral', 'sdfkjb', 'loc', 'medical con', 'oxygen', 'glass glo', 'assesment narrative', 'treatment applied', 'safety Marshal', 'endorsed to', '130/80', '120/80', '', '', '', '98', '99', '', '', '', '19', '20', '', '', '', '36', '37', '', '', '', '98', '99', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile1`
--

CREATE TABLE `profile1` (
  `id` int(20) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `profile_name` varchar(512) DEFAULT NULL,
  `profile_id` varchar(512) DEFAULT NULL,
  `profile_division` varchar(512) DEFAULT NULL,
  `tubercolosis` varchar(512) DEFAULT NULL,
  `tubercolosisv` varchar(512) DEFAULT NULL,
  `hypertension` varchar(512) DEFAULT NULL,
  `hypertensionv` varchar(512) DEFAULT NULL,
  `diabetes_mellittus` varchar(512) DEFAULT NULL,
  `diabetes_mellittusv` varchar(512) DEFAULT NULL,
  `heart_trouble` varchar(512) DEFAULT NULL,
  `heart_troublev` varchar(512) DEFAULT NULL,
  `endocrine_diseases` varchar(512) DEFAULT NULL,
  `endocrine_diseasesv` varchar(512) DEFAULT NULL,
  `cancer_tumor` varchar(512) DEFAULT NULL,
  `cancer_tumorv` varchar(512) DEFAULT NULL,
  `mental_disorder` varchar(512) DEFAULT NULL,
  `mental_disorderv` varchar(512) DEFAULT NULL,
  `frequent_headache` varchar(512) DEFAULT NULL,
  `frequent_headachev` varchar(512) DEFAULT NULL,
  `chronic_cough` varchar(512) DEFAULT NULL,
  `chronic_coughv` varchar(512) DEFAULT NULL,
  `std` varchar(512) DEFAULT NULL,
  `stdv` varchar(512) DEFAULT NULL,
  `hepa_b` varchar(512) DEFAULT NULL,
  `hepa_bv` varchar(512) DEFAULT NULL,
  `hepa_a` varchar(512) DEFAULT NULL,
  `hepa_av` varchar(512) DEFAULT NULL,
  `aids_hiv` varchar(512) DEFAULT NULL,
  `aids_hivv` varchar(512) DEFAULT NULL,
  `covid19` varchar(512) DEFAULT NULL,
  `covid19v` varchar(512) DEFAULT NULL,
  `asthma` varchar(512) DEFAULT NULL,
  `asthmav` varchar(512) DEFAULT NULL,
  `rheumatism` varchar(512) DEFAULT NULL,
  `rheumatismv` varchar(512) DEFAULT NULL,
  `physical_injury` varchar(512) DEFAULT NULL,
  `physical_injuryv` varchar(512) DEFAULT NULL,
  `hernia` varchar(512) DEFAULT NULL,
  `herniav` varchar(512) DEFAULT NULL,
  `typhoid` varchar(512) DEFAULT NULL,
  `typhoidv` varchar(512) DEFAULT NULL,
  `stomach_abdomina` varchar(512) DEFAULT NULL,
  `stomach_abdominav` varchar(512) DEFAULT NULL,
  `kidney_bladder` varchar(512) DEFAULT NULL,
  `kidney_bladderv` varchar(512) DEFAULT NULL,
  `dizziness` varchar(512) DEFAULT NULL,
  `dizzinessv` varchar(512) DEFAULT NULL,
  `allergies` varchar(512) DEFAULT NULL,
  `allergiesv` varchar(512) DEFAULT NULL,
  `others` varchar(512) DEFAULT NULL,
  `othersv` varchar(512) DEFAULT NULL,
  `othersv1` varchar(255) NOT NULL,
  `height` varchar(512) DEFAULT NULL,
  `heightv` varchar(512) DEFAULT NULL,
  `weightd` varchar(512) DEFAULT NULL,
  `weightv` varchar(512) DEFAULT NULL,
  `temp` varchar(512) DEFAULT NULL,
  `tempv` varchar(512) DEFAULT NULL,
  `blood_presure` varchar(512) DEFAULT NULL,
  `blood_presurev` varchar(512) DEFAULT NULL,
  `pulse_rate` varchar(512) DEFAULT NULL,
  `pulse_ratev` varchar(512) DEFAULT NULL,
  `respi` varchar(512) DEFAULT NULL,
  `respiv` varchar(512) DEFAULT NULL,
  `bmi` varchar(512) DEFAULT NULL,
  `bmiv` varchar(512) DEFAULT NULL,
  `skin` varchar(512) DEFAULT NULL,
  `skinv` varchar(512) DEFAULT NULL,
  `ent` varchar(512) DEFAULT NULL,
  `entv` varchar(512) DEFAULT NULL,
  `head` varchar(512) DEFAULT NULL,
  `headv` varchar(512) DEFAULT NULL,
  `chest` varchar(512) DEFAULT NULL,
  `chestv` varchar(512) DEFAULT NULL,
  `back` varchar(512) DEFAULT NULL,
  `backv` varchar(512) DEFAULT NULL,
  `genitals` varchar(512) DEFAULT NULL,
  `genitalsv` varchar(512) DEFAULT NULL,
  `rectal` varchar(512) DEFAULT NULL,
  `rectalv` varchar(512) DEFAULT NULL,
  `ename` varchar(512) DEFAULT NULL,
  `eaddress` varchar(512) DEFAULT NULL,
  `econtact` varchar(512) DEFAULT NULL,
  `erelation` varchar(512) DEFAULT NULL,
  `drinking` varchar(512) DEFAULT NULL,
  `smoking` varchar(512) DEFAULT NULL,
  `exercise` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile1`
--

INSERT INTO `profile1` (`id`, `emp_id`, `profile_name`, `profile_id`, `profile_division`, `tubercolosis`, `tubercolosisv`, `hypertension`, `hypertensionv`, `diabetes_mellittus`, `diabetes_mellittusv`, `heart_trouble`, `heart_troublev`, `endocrine_diseases`, `endocrine_diseasesv`, `cancer_tumor`, `cancer_tumorv`, `mental_disorder`, `mental_disorderv`, `frequent_headache`, `frequent_headachev`, `chronic_cough`, `chronic_coughv`, `std`, `stdv`, `hepa_b`, `hepa_bv`, `hepa_a`, `hepa_av`, `aids_hiv`, `aids_hivv`, `covid19`, `covid19v`, `asthma`, `asthmav`, `rheumatism`, `rheumatismv`, `physical_injury`, `physical_injuryv`, `hernia`, `herniav`, `typhoid`, `typhoidv`, `stomach_abdomina`, `stomach_abdominav`, `kidney_bladder`, `kidney_bladderv`, `dizziness`, `dizzinessv`, `allergies`, `allergiesv`, `others`, `othersv`, `othersv1`, `height`, `heightv`, `weightd`, `weightv`, `temp`, `tempv`, `blood_presure`, `blood_presurev`, `pulse_rate`, `pulse_ratev`, `respi`, `respiv`, `bmi`, `bmiv`, `skin`, `skinv`, `ent`, `entv`, `head`, `headv`, `chest`, `chestv`, `back`, `backv`, `genitals`, `genitalsv`, `rectal`, `rectalv`, `ename`, `eaddress`, `econtact`, `erelation`, `drinking`, `smoking`, `exercise`) VALUES
(2, 53, 'CO, ARIEL BAYOT', 'PCN312', 'HRD', 'NO', 'History last 2012', 'NO', '', 'YES', 'Insulin twice a day and Glumet XR 500mg, Lantus 36units Insulin', 'NO', '', 'NO', '', 'NO', 'Family history Mother side Lung Cancer', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Frozen SHoulder', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', 'History of Dengue last 2011/ Immune Pro, centrum And Vit. B-Complex', '165', 'cm', '75', 'kg', '36.1', 'Normal', '120/90mmHg', 'Normal', '87', 'Normal', '20', 'Normal', '27.1', 'Overweight', 'YES', 'Chicken Skin due to elevated FBS', 'NO', 'Astigmatism / weak hearing at left ear', 'NO', '', 'YES', 'Due to heartburn', 'YES', 'Boil flushing last 2019', 'NO', '', 'NO', '', 'Roderick Bayot', '1 Jabez ST., Riverside Village Pasig City', '09189090948', 'Cousin', 'No', 'No', 'Gym / Aerobics'),
(3, 150, 'VILLAVICENCIO, RODEO DE GUZMAN', 'PCN40', 'STRAT', 'NO', '', 'YES', 'Amlodphene 5mg daily', 'YES', 'xigduo 10/1000 daily', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Dust, Allergic Rhinitis', '', 'NO', '', '170cm', '', '74 kg', '', '32', '', '140/100', '', '86', '', '17', '', '25.6', 'Over weight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'backpain', 'NO', '', 'NO', '', 'Junalie M. Villavicencio', 'Luya San Luis, Batangas City', '09217107775', 'Spouse', 'occassionally', 'Non - Smoker', 'Often Times'),
(4, 95, 'ARELLANO, JENNY AVILA', 'PCN138', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', '2021 Mild Covid', 'NO', '', 'YES', 'Rheumatism in both knees', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'sea foods', '', 'NO', '', '152cm', '', '62.5kg', '', '36.3', '', '130/90', '', '98', '', '18', '', '27.1', 'Over weight', 'YES', 'allergies from sea foods', 'NO', '', 'NO', '', 'NO', '', 'YES', 'massage', 'NO', '', 'NO', '', 'Aiza Arellano', 'Caloocan City', '09489071329', 'Sister', 'Occasionally Beer drinker', 'No', 'Zumba'),
(5, 110, 'DIMAILIG, RHODORA FLORES', 'PCN258', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Dysmenorrhea', 'YES', 'Appendicitis (  operated 20years old )', 'NO', '', 'YES', 'Allergic Rhinitis ( 2021 )', 'Operation', 'YES', 'Breast mass removal at 18 years old', '148cm', '', '52kg', '', '36.1', '', '120/100', 'Normal', '68', 'Normal', '16', 'Normal', '23.7', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Regina Cerdena', '122 Balitoc Calatagan Batangas', '09484121921', 'Sister', 'Yes, Occasionally Start at the age of 20', 'No', 'Yes, Zumba, Basic exercise'),
(6, 136, 'TORRE, JOYCE MARICK RAMOS', 'PCN174', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Positive last January 1, 2022', 'YES', 'start at 9 years old', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Asthma', 'Operation', 'YES', 'Apendectomy', '159cm', '', '65kg', '', '36.2', 'Normal', '110/70', 'Normal', '70', 'Normal', '16', 'Normal', '25.7', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'REYNALDO TORRE JR', '#43 FISHERIES ST BRGY VASRA QUEZON CITY', '09491520727', 'HUSBAND', 'Yes, Occasionally Start at the age of 24', 'No', 'Yes, Jogging, Zumba ( 4x a week )'),
(7, 31, 'BERNAS, MARY JOYCE DIMAILIG', 'PCN410', 'BD1', 'NO', '', 'NO', 'Family history Father side', 'NO', 'Family history', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'March 2021 Mild Covid', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '149', '', '59.5', '', '36.3', '', '120/90', '', '98', '', '16', '', '26.2', 'Over weight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jhon Rey Bernas', '10 Kangkong st. Block 38-B, Bgy. Addition Hills, Mandaluyong City', '09459727462', 'Husband', 'Occasionally Beer drinker', 'No', 'No'),
(8, 123, 'MADRIAGA, JAYSON PALMA', 'PCN405', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'October 2020, Wife had Mild COVID 19', 'NO', '', 'YES', 'Rheumatism or GOUT both hands, Allopurinol', 'YES', 'Laceration of Left Arm due to Motorcycle Accident', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '168', '', '73.5', '', '36.4', '', '120/100', '', '98', '', '18', '', '26', 'Over weight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Rona Madriaga', 'Door F Kimjoe Apartment Edenville Subd. Bgy. Kalayaan, Angono Rizal', '09202509394', 'Wife', 'Moderate Drinker', 'Moderate smoker Vape', 'Once a week exercise, Jogging, Badminton'),
(11, 120, 'INOCENCIO, CHARMAINE REBENITO', 'PCN283', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'January 2021, Mild COVID', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'YES', 'Dextro Scoliosis, reco Exercise', '150', '', '48', '', '36.4', '', '120/80', '', '92', '', '20', '', '23.3', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Don Inocencio', '176 R. Valdez Ext. Bagong Ilog, Pasig City', '09155315412', 'Husband', 'Occasional, Hard Drinker', 'Vape', 'Walking'),
(12, 42, 'DELA PASION, MARY GRACE INTAL', 'PCN127', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'March 2021 Mild Covid Isolation', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Dextro Scoliosis, Hereditary', 'YES', '', '154.5', '', '54', '', '36.3', '', '100/70', '', '98', '', '17', '', '22.6', 'Normal', 'NO', '', 'YES', 'Sore throat,Oct. 30-Nov. 6, 2023', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jay-Ar De Guzman', '27 C-B Tatco st. Bagong Ilog, Pasig City', '0915 104 7365', 'Husband', 'No', 'No', 'Stop Biking last year'),
(13, 71, 'ORMACIDO, ANGELICA INGCO', 'PCN281', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Migraine, Medicol Advance & vomit to relieve the Pain.', 'YES', 'Dry cough, Meds Senecod Forte', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Dust, Allergis Rhinitis', 'Dextro Scoliosis', 'YES', '', '158', '', '53.4', '', '36.4', '', '120/80', '', '103', '', '22', '', '21.4', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Imelda Ormacido', '48 Cotabato St. Bago Bantay, Quezon City', '09055498984', 'Mother', 'No', 'No', 'Seldom exercises'),
(14, 16, 'BARRIOS, ROBERT ESPINA', 'PCN366', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '162', '', '66.1', '', '36.4', '', '120/90', '', '78', '', '17', '', '25.2', 'Over weight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Arminda Barrios', 'Block 5 Lot 364 Bagong Silang, Sucat, Muntinlupa City', '09519003247', 'Spouse', 'Occasionally Beer drinker', 'No', 'Dumbell'),
(15, 54, 'GERILLA, KHRISNA DINGDING', 'PCN407', 'BD1', 'NO', '', 'YES', 'Family History, Mother side', 'YES', 'Family History, Aunts', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '160', '', '59.7', '', '36.3', '', '120/90', '', '65', '', '18', '', '23.3', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Peter Gerilla', 'Bldg. 8 Unit B-8 Bahay Caridad Bayani St, Quezon City', '09665934922', 'Husband', 'Regular Beer drinker', 'No', 'No'),
(16, 68, 'MARALIT, DIANNE MARICRIS GARCIA', 'PCN257', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Hyper acidity', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '157', '', '70.1', '', '36.3', '', '110/80', '', '79', '', '17', '', '28.4', 'Over weight', 'YES', 'with tattoo', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Nelia Maralit', 'Block 194 Lot 11 Mirasol St. Pembo, Makati/Taguig City', '09612379241', 'Mother', 'Yes', 'Yes 2 - 3 sticks per day', 'No'),
(17, 64, 'INCOY, ALEXANDER ORAYE', 'PCN368', 'BD1', 'NO', '', 'NO', '', 'YES', 'Family history, Mother side', 'NO', '', 'NO', '', 'YES', 'Family history, Lung cancer', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'July 2020, mild COVID', 'YES', 'Family History Mother side', 'NO', '', 'YES', 'Undergone Appendectomy', 'NO', '', 'NO', '', 'YES', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '165', '', '74.9', '', '36.2', '', '130/100', '', '65', '', '21', '', '27.5', 'Over weight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Riza Herrera', '1 Engineering St. corner Gladiola st. Araneta University Village Potrero, Malabon', '09683691685', 'Wife', 'Occasionally Beer drinker', 'No', 'No'),
(18, 17, 'CABACIS, CHRISTOPHER DESTURA', 'PCN149', 'BD1', 'NO', '', 'YES', 'Meds Enalaphril, Clopidogrel,Carvidilol, Atorbastatin ', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '178', '', '69.6', '', '36.3', '', '140/90', '', '68', '', '20', '', '22', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Erna Cabasis', 'Hugo st. Luiesiana, Laguna ', '09936124886', 'Spouse', 'Occasionally Beer drinker', 'Stop for 2months', 'Walking'),
(19, 125, 'PASIA, SHERYL PAYNOR', 'PCN13', 'BD1', 'NO', '', 'NO', '', 'YES', 'Family history, Mother side', 'NO', '', 'NO', '', 'YES', 'Family history, Lung, Liver', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'August 2021, Mild COVID', 'YES', 'Allergic Rhinitis', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Acid Reflux', 'YES', 'Kidney stone', 'NO', '', 'YES', 'Shrimp, Mefanamic Acid, Sea Foods', '', 'NO', '', '158cm', '', '60kg', '', '36.3', '', '120/80', '', '71', '', '18', '', '24', 'Normal', 'YES', 'contact dermatitis', 'YES', 'Eyes Contact lens', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Ronnel Pasia', '30 Ibuna st. Bgy Onse, San Juan City', '09178460720', 'Husband', 'Regular Beer drinker', 'No', 'Regular'),
(20, 128, 'PESIGAN, AILEEN DIMAILIG', 'PCN27', 'BD1', 'NO', '', 'YES', 'Meds Lozartan 100. Amlodipine 10mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'March 2020, Asymptomatic', 'NO', '', 'NO', '', 'YES', 'Hysterectomy', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Smell of Jack Fruit', '', 'NO', '', '1.46m', '', '80kg', '', '35.4', '', '200/120', '', '94', '', '20', '', '37.5', 'Obese Class 2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Alex Pesigan', 'Mahabang Lodlod, Taal Batangas', '09396556709', 'Husband', 'Occasionally Beer drinker', 'No', 'Zumba/Walking'),
(21, 39, 'COÑADO, MIE MARTINEZ', 'PCN43', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', '2020 Mild Asymptomatic', 'YES', 'Ventolin', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '156', '', '71.2', '', '36.4', '', '120/80', '', '76', '', '16', '', '29.3', 'Over weight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Michelle Conado', '241 B San Jose st. Bgy San Isidro, Antipolo Rizal', '09304737436', 'Sibling', 'Yes', 'No', 'Seldom'),
(22, 87, 'GARCIA, REYCHELYN BALARAO', 'PCN297', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'allergic rhinitis', '', 'NO', '', '158cm', '', '70kg', '', '36', '', '110/80', '', '101', '', '20', '', '28', 'Over weight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Rubilyn Balarao', 'Bgy. Tukod, San Rafael, Bulacan ', '09504586031', 'Sistrer', 'No', 'no', 'Walking morning'),
(23, 93, 'ILAGAN, JOSEPHINE SARAZA', 'PCN75', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Apendectomy', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Family History (26years old)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Ascorbic acid', '150cm', '', '55kg', '', '36.2', 'Normal', '100/70', '', '89', '', '18', '', '24.4', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Herminigilda Ilagan', 'purok 9 0405 brgy. san agustin trece martirez city cavite ', '09165269734', 'Mother', 'Ocassionally', 'No', 'Yes, Zumba'),
(24, 109, 'MAGNO, RICHARD REYES', 'PCN93', 'BD2', 'NO', '', 'NO', '', 'NO', 'Father History', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', 'Vitamin C', '158.50 cm', '', '72.36', '', '36.10', '', '130/10', '', '72', '', '17', 'Normal', '28.71', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Andrelyn Calara', '47D Espiritu ST, Talaba 7, Bacoor Cavite', '09458927102', 'Sister', 'Yes, occasionally', 'Yes, 5-10 sticks per day', 'Walking, running'),
(25, 137, 'SORIANO, RONALD PAYUMO', 'PCN35', 'BD2', 'NO', '', 'YES', 'Lozartan 10mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '168', '', '80kg', '', '36.1', 'Normal', '130/90', '', '94', 'Normal', '18', '', '28.3', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Letty Soriano', '39 Madonna homes Brgy san andres cainta rizal', '09673975900', 'Wife', 'Yes, occasionally', 'No', 'Yes, Gym and Running, start last week ,ones a week'),
(26, 26, 'BATACLAN, EARL DENNIS ARANETA', 'PCN374', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Due to smoking and weather', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Fish oil and Vitamin B- complex', '166', '', '72.9', '', '36.4', 'Normal', '120/100', 'Normal', '97', '', '22', 'Normal', '26.5', 'Overweight', 'NO', '', 'YES', 'Eyes Vision near sighted 25/20', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Linus Marcus', '2177B brgy. 859 kahilon 2 pandacan manila', '09691748899', 'Son', 'Yes, occasionally', 'Yes, 8 sticks per day', 'No'),
(27, 10, 'ANTIPALA, DIXIE GUERRERO', 'PCN181', 'BD2', 'NO', '', 'YES', 'Family history mother side', 'YES', 'family history father side', 'NO', '', 'NO', '', 'YES', 'Family history Mother side', 'YES', 'GAD, Escitalotram 5mg', 'YES', 'Recently', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Positive 3x , Mild May 7, 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'kidney stones at right kidney', 'YES', 'kidney stones at right kidney', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'vitamin B-12', '161', '', '50.4', '', '36.1', 'Normal', '90/60', 'Normal', '96', 'Normal', '28', '', '19.4', 'Normal', 'NO', '', 'YES', 'Eye vision 180/210', 'NO', '', 'YES', 'Chest pain during stress', 'YES', '', 'NO', '', 'NO', '', 'Dharilyn Antipala Fernandez', '1171P soriano st. Tondo manila', '09631513423', 'Sister', 'Yes, occasionally', 'No', 'Yes,seldom biking'),
(28, 45, 'CARITATIVO, RODERICK MANUEL', 'PCN23', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Medicine mefenamic and Ibuprofen', '', 'NO', '', '164', '', '58', '', '36.2', '', '130/90', '', '78', 'Normal', '24', '', '21.6', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Oscar Caritativo', 'Blk32 Lot11 Syquia St., Kingsville Hills Village, Brgy. San Jose, Antipolo City, Rizal, 1870', '09954887702', 'Father', 'Yes, regularly', 'Yes, 10 sticks per day', 'Yes, walking'),
(29, 114, 'MENDOZA, MOLLY ABUTOG', 'PCN264', 'BD2', 'NO', 'Meds', 'YES', 'Meds Amlodipine 5mg.', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '154', '', '60.9', '', '36.3', '', '140/110', '', '86', '', '17', '', '25.7', 'Over weight', 'NO', '', 'YES', 'Sight 75/75', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Efren Mendoza', '3060 INT. Cordillera St., Bacood, Sta. Mesa, Manila', '09193633541', 'Father', 'Occasionally Beer drinker', 'No', 'Zumba, Jogging, Boxing Seldom'),
(30, 40, 'CAINGAT, JOANLYN CALIMLIM', 'PCN254', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Allergic Rhinitis ( 2017 )', 'Vitamins', 'NO', 'Vitamin C', '145cm', '', '57.5kg', '', '36.3', '', '120/90', 'Normal', '63', 'Normal', '17', '', '27.3', 'Over weight', 'YES', 'allergic to anti bacterial soap', 'YES', 'eye vision far sighted', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Kennith Roman', '1213 Mataas na lupa, Malate manila', '09751141889', 'Husband', 'Yes, occasionally', 'Yes, 1 stick per day', 'No'),
(31, 103, 'LOPEZ, IRMINA SANTOS', 'PCN24', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Immune Pro and Fish oil', '164', '', '55.9', '', '36.4', 'Normal', '120/90', 'Normal', '69', 'Normal', '16', 'Normal', '20.8', 'Normal', 'NO', '', 'NO', 'Eye Vision 150 reading ', 'NO', '', 'NO', '', 'YES', 'Working posture', 'NO', '', 'NO', '', 'George Daniel Lopez Manibo', '2459 Havana st. sta. Ana manila', '09688560882', 'Son', 'Yes, occasionally', 'No', 'No'),
(32, 8, 'ALVAREZ, DAISY LAPORE', 'PCN195', 'BD2', 'NO', '', 'YES', 'Amlodipine 5 mg  and Losartan 5mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '146.5cm', '', '75.8kg', '', '36.2', '', '130/90', 'Normal', '90', 'Normal', '16', 'Normal', '35.3', 'Obese class 2', 'NO', '', 'YES', 'Eyes- corrective glasses', 'NO', '', 'YES', 'Palpitation', 'NO', '', 'NO', '', 'NO', '', 'Apollo Nino Alvarez', '18 Talisay st. Burgos Rodriguez, Rizal', '09273418627', 'Husband', 'Yes, occasionally', 'Yes, 10-15 sticks per day', 'Yes, workout'),
(33, 50, 'CEDULA, EDWIN QUIZON', 'PCN290', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last August 20,2021', 'NO', '', 'YES', 'Gout - allopurinol', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'YES', 'Scoliocis Thoracolumbar / Centrum', '168', '', '67.8', '', '36.4', 'Normal', '140/90', 'high', '101', '', '20', '', '24', 'Normal', 'NO', '', 'YES', 'Eyes Vision 200', 'NO', '', 'NO', '', 'YES', 'Scoliocis Thoracolumbar', 'NO', '', 'NO', '', 'Leah Cedula', '396 f. Collantes dampol 2nd A Pulilan Bolacan 3005', '09150063842', 'Wife', 'Yes, occasionally beer drinker', 'No', 'Yes, walking'),
(34, 152, 'ZAFRA, FERDINAND ROSAL', 'PCN29', 'BD3', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Eczema', 'Vitamins', 'YES', 'Multi Vitamins', '175.5cm', '', '101.1kg', '', '36.2', 'Normal', '180/110', 'high', '94', '', '20', 'Normal', '32.8', 'Obese class 1', 'YES', 'Eczema', 'YES', 'Dry nose and Ears due to aircon , Eyes vision 850/850', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Joselito Rosal Zafra', '2 Alley 4, Olive st, SSS village, Brgy. Concepcion dos , Marikina city', '09274750281', 'Brother', 'Yes, occasionally', 'Yes, E-cigarette 10-15 sticks per day', 'No'),
(35, 57, 'CORTEZ, MICHAEL LABINE', 'PCN46', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Nebulizer', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Ibuprofen', '', 'NO', '', '163.5', '', '72kg', '', '36.1', '', '130/90', 'Normal', '96', '', '18', 'Normal', '26.9', 'Overweight', 'YES', 'Eczema', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Lhizel Cortez', '18 M. Lozada St. Sto. Rosario Silangan, Pateros', '09171031068', 'Wife', 'Yes, occasionally', 'No', 'No'),
(36, 106, 'LUCENA, RACIELLE ANNE REODAVA', 'PCN396', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Acetylcysteine 600mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '150cm', '', '58.8kg', '', '36.1', 'Normal', '120/80', 'Normal', '79', 'Normal', '20', 'Normal', '26.1', 'Overweight', 'YES', 'Eczema', 'YES', 'Eye Vision 475/450', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Rodina Lucena', '219 Sitio Mendez Area 5 Ext. Baesa  Quezon City', '09197598969', 'Mother', 'No', 'No', 'No'),
(37, 113, 'MENDOZA, JERICK JUAREZ', 'PCN202', 'BD2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild Covid-19 last October 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Pharmaton', '162', '', '93.6kg', '', '36.2', 'Normal', '160/110', 'high', '86', 'Normal', '18', 'Normal', '35.7', 'Obese class 2', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Edgardo Mendoza Sr.', '1 Pasong Goma St. Brgy. Malanday Marikina City', '09385817463', 'Father', 'Yes, occasionally', 'Yes, Vape', 'Yes, walking'),
(38, 126, 'PAULINO, MARIA PAULA LUZ MASANGQUE', 'PCN350', 'BD3', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Due to lack of sleep. Meds: Biogesic', 'NO', '', '', 'NO', '', '154.5cm', '', '52.6kg', '', '36.2', 'Normal', '120/90', 'Normal', '79', 'Normal', '18', 'Normal', '22', 'Normal', 'NO', '', 'YES', 'Eye Vision 350/275', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Francisco Paulino', 'Blk 1 Lot 15 Cattleya St. Kapitolyo Homes Bambang Pasig City', '09186131343', 'Father', 'Yes, occasionally', 'No', 'No'),
(39, 133, 'SALAZAR, ANDREW OLAYVAR', 'PCN167', 'BD3', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Left Knee-MCL', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '172cm', '', '73kg', '', '36.2', 'Normal', '120/90', 'Normal', '55', 'low', '17', 'Normal', '24.7', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Angelo Salazar', '613 Protacio st. Pasay City', '09213251510', 'Father', 'Yes, regularly', 'No', 'Yes, Basketball and Jogging'),
(40, 69, 'DELA ROSA, CHRISTIAN MALUTO', 'PCN261', 'BD3', 'NO', '', 'YES', 'Amlodipine 5 mg  and Losartan 100mg / Aporvastatin 40mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Asymptomatic Covid-19 last April 2022', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Immune Pro ', '159.5cm', '', '80kg', '', '36.2', 'Normal', '180/120', 'high', '81', 'Normal', '22', 'Normal', '31.4', 'Obese class 1', 'NO', '', 'YES', 'Eye Vision 75/75 -  Astigmatism', 'NO', '', 'YES', 'Chest pain heart palpitation', 'NO', '', 'NO', '', 'NO', '', 'Jannette Dela Rosa', 'Blk 8 Lot 17 Divine Mercy Vill.  GB1 San Mateo , Rizal', '09324266196', 'Wife', 'Yes, occasionally', 'No', 'No'),
(41, 67, 'DELA CRUZ, ROSALYN SARMIENTO', 'PCN177', 'BD3', 'NO', '', 'NO', '', 'YES', 'For glucose test', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last January,2022, Flu Like Symptoms', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Multi Vitamins', '160cm', '', '65.2kg', '', '36.2', 'Normal', '120/100', 'high', '71', 'Normal', '24', '', '25.5', 'Overweight', 'NO', '', 'YES', 'Eye Vision 70/30', 'NO', '', 'NO', '', 'YES', 'Working posture', 'NO', '', 'NO', '', 'Darwin Dela Cruz', '537 V. Fabella ext. Harapin Ang Bukas Mandaluyong', '09568737871', 'Husband', 'No', 'No', 'No'),
(42, 138, 'TABUENA, JERALDINE DEQUITO', 'PCN385', 'BD3', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '153', '', '45.2', '', '36.4', 'Normal', '100/70', 'Normal', '62', 'Normal', '16', 'Normal', '19.3', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Working posture', 'NO', '', 'NO', '', 'John Carlo Pangantijon', '32 Bernardo st Quezon City', '09682120908', 'Partner', 'No', 'Yes, 5 sticks per day', 'No'),
(43, 7, 'ALMANZOR, JOSEPH MUÑEZ', 'PCN185', 'BD3', 'NO', '', 'YES', 'According to APE 2023', 'YES', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild Covid-19 last  2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '164cm', '', '82.3kg', '', '36.6', 'Normal', '140/100', 'high', '69', 'Normal', '16', 'Normal', '30.6', 'Obese class 1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Joseph Almanzor', 'K1 Blk. 2c Brgy. Pansol Quezon city', '09306977621', 'Father', 'Yes, regularly', 'Yes, 10 sticks per day', 'No'),
(44, 3, 'ADIAO, CHRISTOPHER OFEMIA', 'PCN303', 'BD3', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Due to radiation', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Due to radiation', 'NO', '', '', 'NO', '', '157cm', '', '68kg', '', '36.4', 'Normal', '110/80', 'Normal', '70', 'Normal', '18', 'Normal', '27.6', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Charmaine Billones', '652 Protacio Ext. Pasay City', '09053256667', 'Live in Partner', 'Yes, occasionally', 'Yes, 5 sticks per day', 'Yes, Push up'),
(45, 43, 'CARINO, EDUARDO VILLACORTE', 'PCN70', 'BSG', 'NO', '', 'YES', 'Telimizartan 40mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild Covid-19 last  October, 2021', 'NO', '', 'YES', 'Both knees', 'YES', 'Fractured triceps with surgery last August 24, 2021', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Gerd Meds: Gaviscon', 'NO', '', 'NO', '', '', 'NO', '', '163cm', '', '90kg', '', '36.3', 'Normal', '150/100', 'high', '77', 'Normal', '21', 'Normal', '33.9', 'Obese class 1', 'NO', '', 'YES', 'Eye vision 150/120', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Marilyn Carino', 'Blk 33 Lot 5 Escopa 2 Topside Rd. Project 4 Quezon City', '09658909147', 'Wife', 'Yes, occasionally', 'No', 'No'),
(46, 144, 'VELASCO, EDUARDO EVANGELISTA', 'PCN11', 'BSG', 'NO', '', 'YES', 'No maintenance / Herbal medicine', 'YES', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Gout', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '160cm', '', '69.5kg', '', '36.1', 'Normal', '150/100', 'high/ For Bp monitoring', '127', 'high', '24', 'Medium', '27.1', 'Overweight', 'NO', '', 'YES', 'Dry eyes/ Meds: Moisturizer', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Rita Velasco', 'Blk 18 Lot 4 Dream Homes Subdivision Silangan San Mateo Rizal', '09773542710', 'Wife', 'Yes, occasionally', 'No', 'Yes, weekly Jumping'),
(47, 19, 'BALADJAY, MA. LEONORA CALISIN', 'PCN63', 'BSG', 'NO', '', 'YES', 'Amlodipine 10mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild Covid-19 last July 2022', 'NO', '', 'YES', 'Gout', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Eczema', '', 'YES', 'Bells Palsy Diagnose last march 2018', '147cm', '', '63.9kg', '', '36.3', 'Normal', '140/90', 'high', '80', 'Normal', '16', 'Normal', '29.6', 'Overweight', 'YES', 'Eczema', 'YES', 'Eye vision 250/250 reading', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Joan Del Rosario', '80 Merciful St. Sitio  Veterans Brgy. Bagong Silangan Q.C', '09620774993', 'Daughter', 'No', 'Yes, 7 sticks per day', 'Yes, Zumba and  Walking'),
(48, 130, 'QUIMNO, CHRISTIAN CEASAR MANOBA', 'PCN349', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last October 2020 Asymptomatic', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '167cm', '', '81.4kg', '', '36.4', 'Normal', '160/110', 'Elevated Bp/ For Bp monitoring/ Tx: See a doctor for maintenance', '86', 'Normal', '18', 'Normal', '29.2', 'Overweight', 'NO', '', 'YES', 'Eye vision far sighted', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jayzel Grafil', '171-8 A. Bonifacio St. Kabayanan San Juan City', '09773808205', 'Live in Partner', 'Yes, occasionally', 'No', 'Yes, daily Push-Up'),
(49, 118, 'ODTUHAN, JEFFREY MORALITA', 'PCN277', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Due to smoking', 'YES', 'Gout', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '157cm', '', '70.3kg', '', '36.3', 'Normal', '110/80mmHg', 'Normal', '49', 'Low', '12', 'Low', '28.5', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Maryjane Reyes', '34 Sinagtala St. Dona Pena Tumana, Marikina City', '09307433129', 'Wife', 'Yes, 2x a week , 1 bottle of Gin', 'No', 'Yes, workout'),
(50, 115, 'MIRANDA, JHOANNA PAEZ', 'PCN187', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last June,2022', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Vertigo', 'NO', '', '', 'NO', '', '152cm', '', '63.9kg', '', '36.3', 'Normal', '120/80', 'Normal', '77', 'Normal', '18', 'Normal', '27.7', 'Over weight', 'NO', '', 'YES', 'Eyes vision near sighted ', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Mark Renezar Miranda', '55 Avocado St. Aurora Subd. Angono Rizal ', '09258790915', 'Husband', 'Yes, occasionally', 'No', 'Yes, walking'),
(51, 79, 'FERRER, ROMEL BELANDRES', 'PCN101', 'BSG', 'NO', '', 'YES', 'Amlodipine 10mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '165', '', '80.5kg', '', '36.2', 'Normal', '140/90', 'high', '73', 'Normal', '18', 'Normal', '29.6', 'Overweight', 'NO', '', 'YES', 'Eye vision 125/175', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jessica Ferrer', 'Blk 17 Lot 41 Phase 1 Regina Ville 2000 Subd. Brgy. inocensio, Trece Martires Cavite City', '09279834879', 'Wife', 'Yes, regularly', 'Yes, 2 stick per day', 'Yes, workout'),
(52, 58, 'DAYO, JOEL ANDRES', 'PCN72', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Due to heat', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Gout', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Hyperacidity', 'NO', '', 'YES', 'Due to lack of sleep. ', 'NO', '', '', 'NO', '', '158cm', '', '54.4kg', '', '36.1', 'Normal', '120/90mmHg', 'Normal', '91', 'Normal', '16', 'Normal', '21.8', 'Normal', 'NO', '', 'YES', 'Eye vision far sighted', 'NO', '', 'NO', '', 'YES', 'Working posture', 'NO', '', 'NO', '', 'Ma. Mercy Luz Butalid', 'Blk 41 Zone 5 #9 Daizy St Addition Hills Mandaluyong City', '09310184977', 'Live in Partner', 'Yes, occasionally', 'No', 'Yes, Jogging and walking'),
(53, 143, 'VELASCO, ADRIAN EVANGELISTA', 'PCN82', 'BSG', 'NO', '', 'YES', 'Amlodipine 5 mg  and Losartan 50mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '171cm', '', '79.5kg', '', '36.3', 'Normal', '150/100mmHg', 'high', '75', 'Normal', '16', 'Normal', '27.2', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Revelyn Velasco', 'Blk47 Lot16 Ph.2 Santa Barbara Villas 1 Silangan San Mateo Rizal', '09231891430', 'Wife15', 'Yes, occasionally', 'No', 'Yes, weekly Jogging and walking'),
(54, 62, 'DE LEON, EDWARD PEDRGOZA', 'PCN73', 'BSG', 'NO', '', 'YES', 'Amlodipine 5mg', 'NO', '', 'YES', 'Coronary Artery disease-2021 diagnose for follow up check up', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Left Knee/ Gout Lower extremities', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'skin allergies', '', 'NO', '', '158cm', '', '79.4kg', '', '36.2', 'Normal', '110/80mmHg', 'Normal', '61', 'Normal', '18', 'Normal', '31.8', 'Obese class 1', 'YES', 'allergies', 'YES', 'Eye vision for corrective glasses/ Nose: Sinusitis', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Angel De Leon', '674 Boni Avenue Brgy Pemvu Mandaluyong City', '09692811319', 'Wife', 'Yes, occasionally', 'No', 'Yes, walking'),
(55, 73, 'DORADO, RONALD GREGORY', 'PCN168', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19  Asymptomatic last 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '159cm', '', '70.2kg', '', '36.1', 'Normal', '120/90mmHg', 'Normal', '83', 'Normal', '20', 'Normal', '27.8', 'Overweight', 'YES', 'tattoo at left arm , chest and lower Back', 'YES', 'Ears: Right drum  damage', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jhon Rhovic Dorado', '3424 Int. 60 Bataan St. Brgy. 615 Bacood Sta. Mesa', '09212453811', 'Son', 'Yes, occasionally', 'Yes, occasionally', 'Yes, workout'),
(56, 21, 'BARDE, ELIZABETH GONZAGA', 'PCN220', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Seafoods', '', 'NO', '', '150cm', '', '63kg', '', '36.2', 'Normal', '130/80', 'Normal', '70', 'Normal', '16', 'Normal', '28', 'Overweight', 'NO', '', 'YES', 'Eyes Vision 150/200 with eye drop for maintenance at the left eye.', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Judith Barde', 'Blk 28 Lot 25 Bagong Nayon Ph. 1, San Isidro Rizal', '09355276194', 'Daughter', 'Yes, occasionally', 'No', 'Yes, badminton regularly'),
(57, 100, 'LAGROSA, JOAN BALILI', 'PCN77', 'BSG', 'NO', '', 'YES', 'Amlodipine 10 mg  and Losartan 50mg ', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Wrist part', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '182cm', '', '92.3kg', '', '36.0', 'Normal', '140/100', 'high', '92', 'Normal', '24', 'Normal', '27.9', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Grace Lagrosa', 'Blk37 Panatag Rd. Brgy. Addition Hills Mandaluyong City', '09273605274', 'Wife', 'Yes, occasionally', 'Yes, 3 sticks per day', 'Yes, biking daily'),
(58, 75, 'DUNGARAN, MARIVIC ABAD', 'PCN259', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Amoxicillin 500mg/ Flumucil 600mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'skin allergies', '', 'NO', '', '152cm', '', '52.7', '', '36.1', 'Normal', '130/100mmHg', 'high', '90', 'Normal', '20', 'Normal', '22.8', 'Normal', 'YES', 'skin allergies', 'YES', 'Eye vision with corrective eye glasses', 'NO', '', 'NO', '', 'YES', 'Mild Scoliocis ', 'NO', '', 'NO', '', 'Exodo Dungaran', '75 Lancer St. Brixton Ville Camarin Caloocan City', '09162217856', 'Husband', 'No', 'No', 'No'),
(59, 49, 'CATUNGAL, REYMOND PALMA', 'PCN66', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Lower Back Pain / Sciatica', 'YES', 'Centrum ', '168 cm', '', '66.09 kgs', '', '36.30', '', '130/80', 'Normal', '103', 'Slightly Above', '18', '', '25.22', 'Over weight', 'NO', '', 'YES', 'with corrective glass', 'NO', '', 'NO', '', 'YES', 'Lower back', 'NO', '', 'NO', '', 'Zoemickae Catungal', '17 Mayon ST., Hacienda Village, Concepcion Dos Marikina', '09270616787', 'SOn', 'Yes, regularly, 10 bottles per week', 'yes, 10 sticks per day', 'yes, workout everyday'),
(60, 117, 'MOTEL, PALOMA LARIZA SALAZAR', 'PCN85', 'BD2', 'NO', '', 'NO', 'Mother Side', 'NO', 'Father Side', 'NO', 'Heart Enlargement - Both side', 'NO', '', 'NO', 'Mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Father side', 'NO', 'Both parents', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Seafood / Maruming Hangin', '', 'NO', '', '153 cm', '', '69.81 kgs', '', '36.3', '', '120/80', 'Normal', '88', 'Normal', '16', '', '29.41', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Acute scoliosis', 'NO', '', 'NO', '', 'Florenda S. Motel', '165 Bgy. Darasa Tanauan City Batangas', '09338654921', 'Mother', 'Yes, regularly', 'Vaping', 'walking, jogging stretching - seldom'),
(61, 32, 'BINUYA, REY FERDINAND SINGSON', 'PCN1', 'EXECOM', 'NO', '', 'YES', 'Provasc 5 mg / Simvastatin 10 mg', 'YES', 'Before breakfast : Diamicron (80 mg), Xigduo, Janumet (PM) ', 'NO', 'Myocardial Infarction (history)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History', 'NO', '', 'NO', '', 'YES', 'Mild - once / September 2019', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Sometimes - gird ', 'NO', '2015 CKD', 'YES', 'when blood sugar drops', 'YES', 'Crustacial, aspirin', '', 'NO', 'Multivitamins, Vitamin D3', '168 cm', '', '68.91 kgs', '', '36.22', '', '120/80', '', '109', 'Above normal', '16', 'Normal', '24.92', 'Normal', 'YES', '', 'YES', 'With corrective 130/120, ', 'NO', '', 'YES', 'Gird / Heartburn', 'YES', 'Occasional', 'NO', '', 'NO', '', 'James Imanuel Binuya', '20 Banawe St., Hacienda Heights Village, MArikina', '09088959738', 'Son', 'Occassional', '1 pack a day', 'Workout , Jogging / Walking'),
(62, 78, 'ESTROBO, RAYMOND NECESITO', 'PCN164', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Gout Diclofinac', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '177 cm', '', '84.36', '', '36.50', '', '140/100', '', '84', '', '16', '', '26.96', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Judy Ann Del Rosario', 'Area4 Mercyful St., Sitio Veterans Bgy. Bagong Silangan QC', '09479602837', 'Live-in Partner', 'Occasional', '8 sticks per day', 'no'),
(63, 146, 'VILLANUEVA, FERNANDO ISLA', 'PCN83', 'BSG', 'YES', '2017', 'YES', 'Amlodipin 5mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '153 cm', '', '55.45 kgs', '', '36.20', '', '150/100', '', '91', 'Normal', '20', '', '23.70', 'Normal', 'NO', '', 'YES', 'Corrective lens, far sighted', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Fernando Villanueva Jr', 'B-37 L14 PH2 Sta Barbara Villas / SIlangan San Mateo Rizal', '09925245467', 'Son', 'Seldom', 'No', 'No'),
(64, 90, 'GOMEZ, WILLIAM PATRICK GEROSANO', 'PCN112', 'BSG', 'NO', '', 'YES', 'Losartan 100mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '166cm', '', '90.5kg', '', '36.0', 'Normal', '140/90', 'Normal', '68', 'Normal', '16', 'Normal', '32.8', 'Obese Class 1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Evelyn Gomez', '242 St. Bernard Pantok Binangonan Rizal', '09456490870', 'Wife', 'Yes, occasionally', 'No', 'No'),
(65, 60, 'DE CASTRO, VERONICA PALMERO', 'PCN4', 'BSG', 'NO', '', 'NO', '', 'YES', 'Type 2/Velmepia 1000mg / Glubitor Od 60mg / Roswin 5mg / Luseco 5mg', 'NO', '', 'NO', 'History Gallbladder  1995/ UTI 2011', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last August 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Immune Pro, Vit. B-Commplex', '153cm', '', '49.3kg', '', '36.3', 'Normal', '120/80mmHg', 'Normal', '95', 'Normal', '20', 'Normal', '21.1', 'Normal', 'NO', '', 'YES', 'Eyes Vision far sighted 150/175 ', 'NO', '', 'NO', '', 'YES', 'Sleeping Position', 'NO', '', 'NO', '', 'Jaime Pilar de Castro', '12-A Champaca St. Roxas District, Quezon city', '09178251065', 'Spouse', 'Yes, occasionally', 'No, stop 2000', 'Walking'),
(67, 51, 'CENDAÑA, RICHVON DE GUZMAN', 'PCN198', 'BD2', 'NO', '', 'YES', 'Amlodipine 5mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '166cm', '', '91kg', '', '36.1', 'Normal', '190/140mmHg', 'Elevated Bp/ For Bp monitoring/ Tx: See a doctor for maintenance', '78', '', '17', 'Normal', '33', 'Obese class 1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vicfina Cendana', '17-E Pio Del Pilar St. West Rembo Makati City', '09364909070', 'Mother', 'Yes, regularly', 'No', 'Regular Gym Exercise'),
(68, 5, 'ASEBIAS, LIZA GATON', 'PCN379', 'BD1', 'NO', '', 'NO', 'Family history Father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'NO', '', '159cm', '', '75.8', '', '36.3', 'Normal', '110/80mmHg', 'Normal', '87', 'Normal', '16', 'Normal', '30', 'Overweight', 'NO', '', 'YES', 'Damage Left Ear drum since 1997, Dr. recommendation for surgery', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jeny gaton', 'Blk3 Lot29 Santo, St. Pinalad Cent A. Pinagbuhatan Pasig City', '09120029460', 'Mother', 'Yes, occasionally', 'No', 'No'),
(69, 96, 'JIMENA, MARY ROSE BORBE', 'PCN306', 'HRD', 'NO', '', 'NO', 'Family history both side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Crustasia Meds: Anti- Histamine', '', 'YES', 'Dysmenorrhea', '150cm', '', '54.3kg', '', '36.2', 'Normal', '90/70mmHg', 'Normal', '73', 'Normal', '20', 'Normal', '24.1', 'Normal', 'NO', '', 'NO', '', 'YES', 'Facial injury last September, 2023', 'NO', '', 'YES', 'Lower back pain related to Dysmenorrea', 'NO', '', 'NO', '', 'Ma. Rosalyn Jimena', 'Bldg. 3B 3rd flr. Unit 6 Brgy. 188 Tala Caloocan City', '09611116397', 'Sister', 'Yes, occasionally', 'No', 'No'),
(70, 145, 'VERDE, MA. FE DELIZO', 'PCN216', 'HRD', 'NO', '', 'NO', '', 'NO', 'Family history mother side', 'NO', 'Family history both side', 'NO', '', 'NO', '', 'NO', '', 'YES', 'R-O, Due to anemia', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'YES', 'Sciatica/slip Disc, with back brace since 2017', '150.5cm', '', '49.7kg', '', '36.3', 'Normal', '110/80mmHg', 'Normal', '85', 'Normal', '16', 'Normal', '21.9', 'Normal', 'NO', '', 'YES', 'Eye vision with corrective eye glasses, far sighted', 'NO', '', 'YES', 'With history of Myocardial Infarction', 'YES', 'Due to Sciatica/slip Disc, with back brace since 2017', 'NO', '', 'NO', '', 'Mark JB Verde', '137 Pablo St. Bisig ng Kabataan Sangandaan Caloocan City', '09997905691', 'Son', 'No', 'No', 'Yes, walking and Zumba'),
(71, 12, 'ARELLANO, AIZA AVILA', 'PCN291', 'HRD', 'NO', '', 'NO', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Due to lack of sleep', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Due to food intake \" Chicken\"', '', 'YES', 'Nose bleeding due to thin sinus lining', '154cm', '', '66 kg', '', '36.2', 'Normal', '120/90mmHg', 'Normal', '92', 'Normal', '16', 'Normal', '27.8', 'Overweight', 'NO', '', 'YES', 'Recommendation: need to see an optometris', 'NO', '', 'NO', '', 'YES', 'Wrong posture position', 'NO', '', 'NO', '', 'Jenny Arellano', '3342 JP Rizal st. Pag-asa Camarin Caloocan City', '09566686104', 'Sister', 'Yes, occasionally 2-3 bottles', 'No', 'No'),
(72, 91, 'GONZALES, LESLIE ANN OLBES', 'PCN362', 'HRD', 'NO', '', 'NO', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Anxiety disorder, last therapy 2022', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'No medication , Manageable', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Gerd, Meds: Omeprazole 20mg', 'NO', '', 'NO', '', 'YES', 'Eczema Meds: Diprolene Ointment and Suebalm', 'Vitamins', 'YES', 'Myra-e, and Bewell-c', '156cm', '', '54kg', '', '36.3', 'Normal', '110/90mmHg', 'Normal', '78', 'Normal', '18', 'Normal', '22.2', 'Normal', 'YES', 'Eczema', 'NO', 'Eye vision for corrective eye glasses 200/250', 'NO', '', 'NO', '', 'YES', ' History of Dextro-scoliocis', 'NO', '', 'NO', '', 'Rodolfo', 'Blk 5 Lot 11 Grand Monaco la essenza, manuel L. quezon Ext. Brgy San Roque Antipolo City', '09088765054', 'Live in Partner', 'Yes, occasionally', 'occasionally 1 per day', 'Yes, workout 3x a week');
INSERT INTO `profile1` (`id`, `emp_id`, `profile_name`, `profile_id`, `profile_division`, `tubercolosis`, `tubercolosisv`, `hypertension`, `hypertensionv`, `diabetes_mellittus`, `diabetes_mellittusv`, `heart_trouble`, `heart_troublev`, `endocrine_diseases`, `endocrine_diseasesv`, `cancer_tumor`, `cancer_tumorv`, `mental_disorder`, `mental_disorderv`, `frequent_headache`, `frequent_headachev`, `chronic_cough`, `chronic_coughv`, `std`, `stdv`, `hepa_b`, `hepa_bv`, `hepa_a`, `hepa_av`, `aids_hiv`, `aids_hivv`, `covid19`, `covid19v`, `asthma`, `asthmav`, `rheumatism`, `rheumatismv`, `physical_injury`, `physical_injuryv`, `hernia`, `herniav`, `typhoid`, `typhoidv`, `stomach_abdomina`, `stomach_abdominav`, `kidney_bladder`, `kidney_bladderv`, `dizziness`, `dizzinessv`, `allergies`, `allergiesv`, `others`, `othersv`, `othersv1`, `height`, `heightv`, `weightd`, `weightv`, `temp`, `tempv`, `blood_presure`, `blood_presurev`, `pulse_rate`, `pulse_ratev`, `respi`, `respiv`, `bmi`, `bmiv`, `skin`, `skinv`, `ent`, `entv`, `head`, `headv`, `chest`, `chestv`, `back`, `backv`, `genitals`, `genitalsv`, `rectal`, `rectalv`, `ename`, `eaddress`, `econtact`, `erelation`, `drinking`, `smoking`, `exercise`) VALUES
(73, 140, 'TOMENIO, MA. REYNA DOMASIG', 'PCN409', 'HRD', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'NO', '8 Months Pregnant/ Ferous Sulfate, OB- min Plus, Anmun', '147cm', '', '53.1kg', '', '36.3', 'Normal', '120/80mmHg', 'Normal', '95', 'Normal', '16', 'Normal', '24.6', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Niel Mananguite', '81 Makaturing st. Barangka Itaas Mandaluyong City', '09207236097', 'Live-in Partner', 'No', 'No', 'Yes, sit-up'),
(74, 38, 'CABANGIS, RICHARD NOMBRA', 'PCN398', 'HRD', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Allergic Rhinitis Meds: Cetirizine', '', 'NO', '', '161cm', '', '55kg', '', '36.4', 'Normal', '120/100mmHg', 'Elevated', '84', 'Normal', '18', 'Normal', '21.2', 'Normal', 'NO', '', 'YES', 'Recommend to see an Optometrists', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Relin Cabangis', '119 Sagisag st. Tanza Navotas City', '09219382112', 'Mother', 'No', 'No', 'Yes, biking '),
(75, 129, 'POLICARPIO, ABIGAEL MANANSALA', 'PCN408', 'HRD', 'NO', 'Family History, Both sides', 'NO', 'Meds Amlodipine 10mg.', 'NO', 'Family history, Both side', 'NO', 'Family History father side', 'NO', '', 'NO', 'Family history, both sides', 'YES', 'Anxiety Attack', 'YES', 'Migraine, Biogesic', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'May 2023, Asymptomati', 'NO', '', 'YES', 'Rheumatism in both hands', 'YES', 'Spine Lumbar Injury 2013', 'NO', '', 'NO', '', 'YES', 'dysmenorrhea, acid reflux', 'YES', 'Kidney stone, 2000, for follow up check up', 'YES', 'Vertigo, 2013', 'YES', 'allergic rhinitis, food intake, poultry', '', 'NO', '', '159cm', '', '59kg', '', '36.4', '', '140/100', '', '89', '', '18', '', '23.3', 'Normal', 'NO', '', 'YES', 'Sight 100/75 w/corrective glasses, right ear -weak hearing', 'NO', '', 'NO', '', 'NO', 'back pain due to kidney stone', 'NO', '', 'NO', '', 'Albren Baltazar', '263 North Diversion Rd. Bacloocan City', '09777966910', 'Partner', 'No', 'No', 'No'),
(76, 104, 'LOPEZ, PAUL RINGO MIRANDA', 'PCN180', 'HRD', 'NO', '', 'YES', 'amlodipine 5mg / family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last March 2021', 'YES', 'Family history Mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '168cm', '', '72.7kg', '', '36.3', 'Normal', '150/100mmHg', 'high', '85', 'Normal', '18', 'Normal', '25.8', 'Overweight', 'NO', 'with tattoo both arms, chest, both legs and back', 'NO', 'Eyes with corrective glasses, vision 100/100', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Celeste', '2241-A Tejeron st. Sta Ana, Manila', '09295268107', 'Mother', 'Yes, occasionally', 'Yes, 10 sticks per day', 'No'),
(77, 6, 'AGUILAR, DITAS LUZ', 'PCN318', 'HRD', 'NO', '', 'YES', 'Losartan 50mg', 'NO', '', 'YES', 'Due to Hypertension', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Vitamin-C', '152.5cm', '', '68.9kg', '', '36.3', 'Normal', '160/110mmHg', 'high', '84', 'Normal', '22', 'Medium', '29.6', 'Overweight', 'NO', '', 'NO', 'Eye vision near sighted with corrective glasses', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Danilo Aguilar', 'Blk 3 Lot 1&3 1st Christian Community Ville, Pinagbuhatan pasig City', '09164190465', 'Husband', 'No', 'No', 'Yes, walking'),
(78, 65, 'DEL ROSARIO, RODOLFO CANLAS', 'PCN74', 'BSG', 'NO', '', 'YES', 'Losartan 50mg', 'YES', 'Metformin 500mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last 2022', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '165cm', '', '98.2', '', '36.3', 'Normal', '140/100mmHg', 'high', '78', 'Normal', '22', 'Medium', '36.1', 'Obese class 2', 'NO', 'skin allergy', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Joan Del Rosario', '0490 Area 6 Brgy Botocan Q.C', '09620774993', 'Daughter', 'Yes, occasionally hard drinker', 'No', 'No'),
(79, 112, 'MASCARINA, VERA ELLEN FLORES', 'PCN244', 'HRD', 'NO', '', 'NO', '', 'NO', 'Family history both side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Co-Altria and Seretide', 'NO', '', 'YES', 'sciatica since 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', 'family history Undergone dialysis', 'NO', '', 'YES', 'Asthma', '', 'NO', 'Scoliosis since 18 years old', '153cm', '', '63kg', '', '36.3', 'Normal', '120/80mmHg', 'Normal', '73', 'Normal', '20', 'Normal', '26.9', 'Overweight', 'NO', '', 'YES', 'Nose Inflammation of Sinus', 'NO', '', 'NO', '', 'YES', 'Due to Scoliosis/Sciatica', 'NO', '', 'NO', '', 'Devert Mascarina', 'Blk50 Lot 16  Centella Homes Subd., Montalban Rizal', '09158273872', 'Spouse', 'No', 'No', 'Yes, physical teraphy'),
(80, 98, 'JOVES, SHARMAINE ACEJO', 'PCN365', 'HRD', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history Mother side hyperthyroidism', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history Mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Food Intake', '', 'NO', '', '154cm', '', '47.6', '', '36.4', 'Normal', '110/90mmHg', 'Normal', '76', 'Normal', '16', 'Normal', '20.1', 'Normal', 'NO', '', 'NO', 'Left eye has astigmatism', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Imelda Joves', '2006 Gen San Miguel St. Sangandaan  Caloocan City', '09973724882', 'Mother', 'No', 'No', 'No'),
(81, 99, 'LABASAN, NOEL OCHOA', 'PCN304', 'HRD', 'NO', 'Family history father side', 'NO', 'Family history mother side', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '164cm', '', '71.7', '', '35.4', 'Normal', '120/90mmHg', 'Normal', '62', 'Normal', '16', 'Normal', '26.7', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Gloria Labasan', '179 Col Ver St. Brgy. Kabayanan San Juan City', '09608101916', 'Mother', 'Yes, occasionally', 'No', 'Seldom'),
(82, 83, 'FUENTES, PATRICIA MAE VILLAMENTE', 'PCN179', 'HRD', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Dysmenorrhea', 'YES', 'Gallstones 2019', 'NO', '', 'NO', '', '', 'NO', '', '162cm', '', '134.1kg', '', '36.2', 'Normal', '120/90mmHg', 'Normal', '81', 'Normal', '20', 'Normal', '51.1', 'Obese class 3', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'John Bernard Alonzo', '1467 Int. 14 Gomez St. Paco Manila', '09954570474', 'Live in Partner', 'Yes, occasionally', 'No', 'No'),
(83, 121, 'PAMILARAN, ZENAIDA MELLEVO', 'PCN173', 'HRD', 'NO', '', 'YES', 'Valsartan 80mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Right knees', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of Surgery in Gallbladder  (Gallstones)1992', 'NO', '', 'NO', '', '', 'NO', '', '157cm', '', '75.3', '', '36.3', 'Normal', '150/90', 'high', '75', 'Normal', '16', 'Normal', '30.5', 'Obese class 1', 'NO', '', 'YES', 'Eyes with corrective eye glasses 225/225', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Ricardo Pamilaran', '417 Barangka Drive St. Brgy. Barangka Mandaluyong City', '09155393204', 'Husband', 'Yes, occasionally', 'No', 'Yes, walking'),
(84, 82, 'FORMARAN, JOSHUA CRUZ', 'PCN334', 'HRD', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Possible having Myocardial Infarction; Recommendation: for check up and total work up', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'collar bone fractured due to motorcycle accident', 'NO', '', 'NO', '', 'NO', '', 'YES', 'R-O Kidney disease Recommendation: Need to see Neurologist', 'NO', '', 'NO', '', '', 'NO', '', '164cm', '', '67.3kg', '', '36.4', 'Normal', '130/100mmHg', 'Elevated', '76', 'Normal', '16', 'Normal', '25', 'Normal', 'NO', '', 'YES', 'with corrective eye glasses 125/150', 'NO', '', 'YES', 'For Doctors evaluation', 'YES', 'R-O Kidney disease', 'NO', '', 'NO', '', 'Shaidhel Villaruel', '526 P. Burgos st. Brgy. Poblacion, Mandaluyong City', '09067043498', 'Live-in Partner', 'Yes, regularly 5 bottles of beer 500', 'Yes, vape', 'No'),
(85, 107, 'LUCENA, REINA ROSE ', 'p', 'HRD', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Since 2022 due to smoking', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', 'History of Pneumonia last September 2023', '160', '', '52kg', '', '36.4', 'Normal', '110/80mmHg', 'Normal', '79', 'Normal', '24', 'Medium', '20.3', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Nora Lucena', 'Blk 1 Lot 11 lite green heights Phase 6 Roque 1 Brgy. Pasong Tamo Q.C', '09383149002', 'Mother', 'Yes, occasionally', 'Yes, 5 sticks per day', 'No'),
(86, 77, 'ESMALDE, ROCHE LARA', 'PCN361', 'HRD', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history father side (lung cancer)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history Father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Skin rashes due to food Intake (carrots and shrimp) ', '', 'NO', '', '157cm', '', '80.6kg', '', '36.3', 'Normal', '130/100mmHg', 'Normal', '65', 'Normal', '20', 'Normal', '32.7', 'Obese class 1', 'NO', '', 'YES', 'Vision with corrective glasses 25/75', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Roseneth Barbosa', '816 San Pablo St. Brgy. Plainview Mandaluyong City', '09207394744', 'Sister', 'No', 'No', 'No'),
(87, 149, 'VILLAVICENCIO, JUNALIE MIRARAN', 'PCN121', 'FINANCE', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Father side ', 'NO', 'Father Side / Hyper Thyroid - 2005', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History due to birth giving', 'NO', '', 'YES', 'Crustaceans', '', 'NO', 'Hyphokalemia - 2019 treated / Stresstab / Profan with Iron, Vitamin C, Hysterectomy', '158 cm', '', '51.14 kgs', '', '36.30', '', '110/80', '', '75', '', '18', 'Normal', '20.49', 'Normal', 'NO', '', 'YES', 'Near SIghted / 225', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Rodeo Villavicencio', 'Luya, San Luis Batangas', '09478093814', 'Spouse', 'No', 'No', 'Walking / Stretching'),
(88, 142, 'PEREDA, MARLUDETH VILLEGAS', 'PCN17', 'FINANCE', 'NO', '', 'YES', 'Amlodipine 5 mg', 'YES', 'Boundary / Metformin 500mg once a day', 'YES', 'Weak Heart / Injection every 28 days Benzathine / Family History', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'High Cholesterol', 'NO', 'Atorvastatin, Vitamin C', '158 cm', '', '73.45 kgs', '', '36.40', '', '160/100', '', '65', '', '20', '', '29.42', 'Overweight', 'NO', '', 'YES', 'Glucoma Left Eye, Timolol Eye ', 'NO', '', 'YES', 'Heavy specially when stressed', 'NO', '', 'NO', '', 'NO', '', 'Jesus Fernandez Jr.', '650 DOna Maria St. Santol Sampaloc Manila', '82571307 / 09293299324', 'Common Law Husband', 'No', 'No', 'Walking every day'),
(89, 147, 'DEL ROSARIO, JOAN BALADJAY', 'PCN286', 'FINANCE', 'NO', '', 'NO', 'Father Side', 'NO', 'Father Side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Puyat and tutok sa screen', 'NO', 'two weeks ago, water therapy', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '150 cm', '', '63.63 kg', '', '36.20', '', '100/70', 'Normal', '67', '', '16', '', '28.28', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Ma. Leonora Baladjay', '0490 Area VI Bgy Botocan Quezon City', '09216470864', 'Mother', 'no', 'No', 'Walking everyday'),
(90, 33, 'BELDAD, MA. CHRISTINA MILLANTE', 'PCN107', 'FINANCE', 'NO', '', 'NO', 'Father and Mother', 'NO', 'Father Side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Operation', 'YES', 'Right Leg operation due to motorcycle accident', '153 cm', '', '66.73 kgs', 'Ideal Weight is 46.81 kgs', '36.40', '', '120/80', '', '82', '', '18', '', '28.50', 'Overweight', 'YES', 'Tattoo Arm, Leg', 'NO', 'Correction lens only', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Leticia M. Beldad', '5570 Taurus St., CII-A Nagpayong Pinagbuhatan, Pasig City', '09914682556', 'Mother', 'No', 'Yes, 3-4 sticks ', 'Walking / Physical Therapy'),
(91, 35, 'BELTRAN, JAY-AR ARAMBULO', 'PCN236', 'FINANCE', 'NO', '', 'NO', '', 'NO', 'Father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', 'November 2022 Dog Bite / anti rabies', '167 cm', '', '58.91 kgs', '', '36.3', 'Normal', '180/130', 'For check-up, no medicine and no symptoms', '70', '', '16', '', '21.12', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'X-ray findings for 2023 APE', 'NO', '', 'NO', '', 'Benny Beltran', 'Purok 1 Zone 8 Bgy. Cupangm Antipolo City', '09631759404', 'Brother', 'Yes, regularly 3x a week, 6 bottles', '5 sticks / day', 'Basketball '),
(92, 29, 'ASAGRA, CLARIZA GERNATE', 'PCN285', 'FINANCE', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Sister', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', 'Ascorbic Acid with Zinc', '148.5 cm', '', '44.45 kgs', '', '36.3', '', '100/80', 'Normal', '69', '', '16', '', '20.16 ', 'Normal', 'NO', '', 'NO', 'Right flicking', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Delia Asagra', '1718 2nd St. Punta, Sta Ana, Manila', '09216754190', 'Mother', 'Yes, occasionally', 'No', 'Sit-ups, jogging if time permits'),
(93, 70, 'DE GUIA, JOAN OLBES', 'PCN389', 'FINANCE', 'NO', '', 'NO', 'Father Side', 'NO', 'Father Side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '2021 September Hospitalized', 'NO', 'Father Side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', 'Raspa - July 2021 due to hormonal imbalance polyps', '155 cm', '', '72.64', 'Normal weight should be 60.06 kgs', '36.40', '', '130/90', '', '106', '', '18', '', '30.23', 'Obese class 1', 'NO', '', 'YES', 'with corrective lens 125/100', 'NO', '', 'NO', '', 'YES', 'Right side - ', 'NO', '', 'NO', '', 'Archel D De Guia', '2166 Suter ST., Sta. Ana, Manila', '09814905909', 'Husband', 'No since 2016', 'No since 2016', 'No'),
(94, 84, 'DORADO, ROMMEL GREGORY', 'PCN388', 'FINANCE', 'NO', '', 'NO', 'Father Side', 'NO', '', 'NO', 'Myocardial Infraction (history) Father Side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Hyperacidity Omeprazole / Ulcer', 'NO', '', 'YES', 'During medication', 'NO', '', '', 'NO', 'Stress Tab and B Complex', '155 cm', '', '44.91', '', '36.20', '', '100/80', 'Normal', '64', 'Normal', '16', '', '18.69', 'Normal', 'NO', '', 'YES', 'Nasal Mucus', 'NO', '', 'NO', '', 'YES', 'due to motorcycle / tolerable', 'NO', '', 'NO', '', 'Gloria G. Dorado', '2902 V. P Cruz ST., P5 Bgy Lower Bicutan, Taguig City', '09325390383', 'Mother', 'No since 2019', 'No', 'Gym, trekking and workout'),
(95, 92, 'FUGABAN, JEILA MARIE GUZMAN', 'PCN207', 'FINANCE', 'NO', '', 'NO', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '163cm', '', '70.4kg', '', '36.2', '', '160/110mmHg', '', '78', '', '24', '', '26.5 kg/m2', 'Overweight', 'NO', '', 'NO', 'Eyes-Stigmatism', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Gabriel Diaz', '#106 Ballecer St. South Signal Village Taguig City', '09859535575', 'Husband', 'Yes, occasionally', 'No', 'Yes, walking'),
(96, 86, 'DUMALUAN, MARIE ', 'PCN206', 'FINANCE', 'NO', '', 'NO', 'Family history Father side', 'NO', 'Family history Father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'January 2022 during APE, asymptomatic', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '146cm', '', '51.3Kg', '', '36.4', '', '120/80mmHg', '', '90', '', '16', '', '24.1 kg/m2', 'Normal', 'NO', '', 'NO', 'Eyes 100/150', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Emma Vidal', '293 Champaca 1 Brgy Fortune Marikina City', '09392917976', 'Sister', 'Yes, occasionally', 'No', 'yes, workout everyday'),
(97, 116, 'LUCENA, LEA ANNE REODAVA', 'PCN390', 'FINANCE', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Grade 1-3', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Seafoods- Food intake, crustaceans', '', 'NO', '', '152cm', '', '87.36kg', 'for monitoring', '36.1', '', '140/100mmHg', '', '95', '', '18', '', '37.8 kg/m2', 'Obese Class II', 'YES', 'Tattoo left & right arm', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild Scoliocis ', 'NO', '', 'NO', '', 'Rodina Lucena', '219 Sitio Mendez Area 5 Ext. Baesa  Quezon City', '09197598969', 'Mother', 'No', 'No', 'No'),
(98, 105, 'LIPAT, FLORDELIZA DUMA', 'PCN211', 'FINANCE', 'NO', '', 'NO', 'Family History mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Pregnant-third trimester', 'NO', '', '151cm', '', '61.7kg', '', '36.2', '', '120/80mmHg', '', '80', '', '16', '', '27.1 kg/m2', 'Overweight (Pregnant)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Joseph Mancilla', 'Lobo Batangas', '09103832808', 'Live-in-Partner', 'No', 'No', 'Yes, walking'),
(99, 14, 'VILLARUEL, SHAIDHEL SALANSAN', 'PCN411', 'FINANCE', 'NO', '', 'NO', '', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'until high school', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Hyperacidity', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '153 cm', '', '73.6kg', 'for weight monitoring', '36.2', '', '130/100mmHg', '', '71', '', '18', '', '31.4 kg/m2', 'Obese Class I', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Posture', 'NO', '', 'NO', '', 'Joshua Cruz Formaran', '526 P. Burgos st. Brgy. Poblacion, Mandaluyong City', '09356473100', 'Live-in-Partner', 'Yes, occasionally', 'No', 'Yes, workout every weekend'),
(100, 72, 'DELA CRUZ, DARWIN CAPPAROS', 'PCN307', 'FINANCE', 'NO', '', 'YES', 'No Medication, follow-up check up', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '169cm', 'for monitoring', '111.4kg', 'for monitoring', '36.3', '', '130/100mmHg', '', '97', '', '20', '', '39 kg/m2', 'Obese Class II', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Rosalyn Dela Cruz', '537 Harapin Ang Bukas Mandaluyong City', '09913483772', 'Wife', 'Yes, regularly', 'Yes, 5 sticks per day', 'No'),
(101, 61, 'BUISER, SIMONET CASTILLO', 'PCN100', 'FINANCE', 'NO', 'Family history father side', 'YES', '', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Gout- due to food intake, no medication', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '154', '', '63.3kg', '', '36.3', '', '150/100mmHg', '', '67', '', '24', '', '26.7 kg/m2', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Scoliocis ', 'NO', '', 'NO', '', 'DARWIN BUISER', '#37 Del Pilar St. Brgy. Alaminos Laguna', '09257396330', 'Spouse', 'No', 'No', 'Yes, walking regularly'),
(102, 25, 'ADANO, GERALD RAMOS', 'PCN373', 'FINANCE', 'NO', '', 'NO', 'Family history mother/father side', 'NO', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Hyperacidity', 'NO', '', '166cm', '', '80.0kg', '', '36.4', '', '130/100mmHg', '', '81', '', '20', '', '29 kg/m2', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Rosalyn Adano', '#41 Blk 2 Zone 2 Brgy Fort Bonifacio Taguig City', '09165228760', 'Wife', 'Yes, occasionally', 'No', 'No'),
(103, 74, 'DELUSO, RICAREDO BENID', 'PCN265', 'FINANCE', 'YES', 'August 2023, cleared', 'YES', 'with medication (Amlodipine 5mg, Atorvastatin 10mg), family history both side', 'YES', 'with medication (Metformin 500mg), family history both side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Fatty liver', 'NO', '', '171cm', '', '68kg', '', '36.3', '', '130/90mmHg', '', '80', '', '18', '', '23.3 kg/m2', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Darin Deluso', '#78 Anapolis St. Brgy. E Rodriguez Cubao Quezon City', '09983513580', 'Brother', 'No', 'No', 'No'),
(104, 28, 'AQUINO, RACHELLE AGBUNAG', 'PCN387', 'FINANCE', 'NO', '', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '160cm', '', '56kg', '', '36.4', '', '110/80mmHg', '', '85', '', '17', '', '21.9 kg/m2', 'Normal', 'YES', 'Tattoo right arm', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Gina Aquino', 'Road 9 Punzalan St. New Lower Bicutan Taguig City', '09454484936', 'Mother', 'Yes, occasionally', 'Yes, Vape', 'No'),
(105, 102, 'GARCIA, CHERRY ANN BARCOMA', 'PCN208', 'FINANCE', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Migraine with medication dolfenal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Knees & Arm', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Acid Reflux, Omeprazol 20mg', 'YES', 'Gallblader diagnosed with polyps', 'NO', '', 'NO', '', '', 'YES', 'Myoma, Carpal Tunnel', '163cm', '', '63kg', '', '36.4', '', '120/90mmHg', '', '59', '', '16', '', '23.7 kg/m2', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Lower backpain, for consultation', 'NO', '', 'NO', '', 'Apple Veleriano', '2827 Silang St. Sta. Ana Manila', '09214962742', 'Sister', 'Yes, occasionally 10 bottles of beer', 'Yes, Vape', 'Yes, walking'),
(106, 56, 'BONGAY, JESSICA CABACUNGAN', 'PCN64', 'FINANCE', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', '', 'YES', 'Due to change of weather', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'CT scan for abdominal, found mass in the colon', 'NO', '', 'NO', '', 'NO', 'Allergic Rhinitis Meds: Biogesic', '', 'YES', 'Irregular bowel movement due to mass in the colon-to see a gastroenterologist', '157cm', '', '54.5kg', '', '36.2', '', '110/90mmHg', '', '75', '', '20', '', '22.1 kg/m2', 'Normal', 'YES', 'Tattoo left & right arm', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Erika Bongay', 'Blk 22 Lot 39 Beverly Homes Marilao Bulacan', '09260797321', 'Sister', 'Yes, occasionally', 'No', 'Yes, workout'),
(107, 66, 'CHAVEZ, RUBENA KRISNA TUSI', 'PCN309', 'FINANCE', 'NO', '', 'NO', 'Family history mother side', 'NO', '', 'YES', 'Family history mother heart attack', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'until Grade 4', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '157cm', '', '76.6kg', 'for monitoring', '36.2', '', '110/90mmHg', '', '90', '', '20', '', '31.1 kg/m2', 'Obese Class I', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Backpain lower back due to posture', 'NO', '', 'NO', '', 'Jordan Omadto', '2943 Unit D Punta Sta. Ana Manila', '09604790525', 'Partner', 'Yes, occasionally (3-5 bottles) ', 'No', 'No'),
(108, 59, 'DAYRIT, CHRISTINE JANE FRANCISCO', 'PCN393', 'FINANCE', 'NO', '', 'YES', 'Family history father side', 'YES', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Chicken- rashes', '', 'NO', '', '164cm', '', '59.5kg', '', '36.3', '', '110/90mmHg', '', '83', '', '18', '', '22.1 kg/m2', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jeanly Dayrit', 'Blk 24 Lot 3 Carissa 3A CSSDM Bulacan', '09205394570', 'Mother', 'Yes, occasionally (2 bottles)', 'Yes, 4 sticks a day', 'No'),
(109, 47, 'CASTILLO, BRYAN GARCIA', 'PCN284', 'STRAT', 'NO', '', 'YES', 'Amlodipine 10mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'YES', 'Bells Palsy Diagnose last April 15,2023 Meds: Prednisone', '168 cm', '', '109.4kg', '', '36.4', 'Normal', '140/90mmHg', 'Normal', '95', 'Normal', '16', 'Normal', '38.8', 'Obese class 2', 'NO', '', 'NO', 'Eye vision with corrective eye glasses', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Shirley Lipata', '1563 Antonio isip st. Brgy. 814 Zone 88 Paco Manila City', '09079449725', 'Auntie', 'Yes, occasionally', 'No', 'No'),
(110, 154, 'PELAYO, ANAMIE ', 'PCN1010', 'STRAT', 'NO', '', 'NO', 'Family history Both side (CBA)', 'NO', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Migraine Meds: Biogesic', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'YES', 'Frozen shoulder last October 2022', '159cm', '', '70.1kg', '', '36.3', 'Normal', '110/80mmHg', 'Normal', '87', 'Normal', '20', 'Normal', '27.7', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Mary Pelayo', '103-B Medium MSE Condominium, Villarica st. Mabini J.Rizal Mandaluyong City', '09992251330', 'Sister', 'No', 'No', 'No'),
(111, 27, 'BEDIS, MATT HARRIS ', 'PCN401', 'STRAT', 'NO', '', 'NO', 'Family history mother side (CBA)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last September 2022', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Hyperacidity ocasionally', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '161.5', '', '75.4', '', '36.2', 'Normal', '110/70mmHg', 'Normal', '64', 'Normal', '18', 'Normal', '28.9', 'Overweight', 'YES', 'with tattoo Left calf and right arm', 'YES', 'Eye vision near sighted no corrective glasses Recommend to see optometrist', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Benedicta Bedis', 'Zone 1 Gubat-Ilawod, Bacacay, Albay', '09104885400', 'Mother', 'Yes, occasionally (2-3 bottles) ', 'Yes, 5-6 sticks per day', 'Yes, biking '),
(112, 55, 'COROZA, HERENZO MENDOZA', 'PCN296', 'STRAT', 'NO', '', 'NO', '', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', 'Family history Mother side Breast and Leukemia Cancer', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild Covid-19 last January, 2022', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'NO', 'Immune Pro ', '158.5', '', '84.4', '', '36.6', 'Normal', '120/80mmHg', 'Normal', '87', 'Normal', '16', 'Normal', '33.6', 'Obese class 1', 'NO', '', 'YES', 'Astigmatism ', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Emily Balneg', '1047-D Leyte del St. Sampaloc Manila', '09774943926', 'Auntie', 'Yes, occasionally', 'Vaping', 'Yes, On a regular basis gym and workout'),
(113, 119, 'OLIVA, AILEEN DE LEON', 'PCN55', 'STRAT', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last 2020', 'NO', 'Family History ', 'NO', '', 'NO', '', 'YES', 'Abdominal Hernia diagnose last 2018', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Food Intake (seafoods)', '', 'NO', '', '151cm', '', '90.9kg', '', '36.2', 'Normal', '120/80mmHg', 'Normal', '75', 'Normal', '20', 'Normal', '39.9', 'Obese class 2', 'NO', '', 'NO', 'with corrective eye glasses (reading)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Alaric Oliva', '6 Galaxy St., Meteor Homes Fortune Marikina City', '09178859590', 'Brother', 'Yes, occasionally', 'Yes, Iqcos 5-8 sticks per day', 'Yes, walking'),
(114, 131, 'RAMOS, FERNANDO SANTOS', 'PCN176', 'STRAT', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Acid Reflux, Kremil-S', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '168 cm', '', '54.8kg', '', '36.3', 'Normal', '110/80mmHg', 'Normal', '71', 'Normal', '18', 'Normal', '19.4', 'Normal', 'NO', '', 'NO', 'Eye vision for consultation', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Lolita Ang', 'A-2H Golfhill Terraces Manotok Drive Matandang Balara Quezon City', '28711180', 'Auntie', 'No', 'No', 'Yes, On a regular basis gym '),
(115, 88, 'GENOVA, SHELAH MEL DE VERA', 'PCN998', 'PPI', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Centrum ', '155 cm', '', '60kg', '', '36.4', 'Normal', '100/70mmhg', 'Normal', '78', 'Normal', '20', 'Normal', '25', 'Normal', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Imelda Genova', '2139 Rd 12 Fabie Estate Sta. Ana manila', '09610271249', 'Mother', 'Yes, occasionally', 'Yes, 5 sticks per day', 'Yes, regularly walking and jogging'),
(116, 18, 'BAESA, HERMONIDES CUSTODIO', 'PCN16', 'PPI', 'NO', '', 'YES', 'Losartan and  Atorvastatin', 'YES', 'Jardiance duo and Gliclazaide', 'YES', 'Trimetazidine, Carvedilol, Clopidogrel, and Furic / History of mild M.I last August 2021/ Angiogram last December2022', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', 'To get a copy of laboratory result', '166cm', '', '81.1kg', '', '35.4', 'Normal', '120/80mmHg', 'Normal', '64', 'Normal', '18', 'Normal', '29.4', 'Overweight', 'NO', '', 'YES', 'Right eye retinopathy', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Mary Anne Baesa', '10 VTS Sumapang Matanda Malolos, Bulacan', '09053364415', 'Wife', 'No', 'Quit smoking since 2021', 'Yes, walking'),
(117, 80, 'FONTANILLA, ALBERTO GUBA', 'PCN97', 'PPI', 'NO', '', 'YES', 'Amlife 50/5mg', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history father side large intestine', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '176.5cm', '', '84.3kg', '', '36.2', 'Normal', '140/90mmhg', 'Normal', '73', 'Normal', '22', 'Medium', '27.1', 'Overweight', 'NO', '', 'YES', 'Eye vision with corrective glasses 125/125', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Ma. Gienel Fontanilla', '307-C Mabini St. Sampaloc Manila', '09171533652', 'Wife', 'Yes, regularly beer and brandy drinker', 'No', 'Yes, Basketball '),
(118, 101, 'LICSI, MANUEL GUEVARA', 'PCN2', 'EXECOM', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Anxiety and depression Meds: Serotia and Rivotril as needed/ Psycho therapy every 6 months', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of fractured on left toe since 2001', 'NO', '', 'NO', '', 'YES', 'Gerd Meds: Buscopan', 'NO', '', 'YES', 'Vertigo Meds: Serc ', 'YES', 'Allergic Rhinitis Meds: Zyrtec, Virlix and Nafharin A / Mertiolet', 'Vitamins', 'YES', 'Immuno-Pro', '166cm', '', '85.7kg', '', '36.3', 'Normal', '120/90mmHg', 'Normal', '104', 'high', '16', 'Normal', '31.1 kg/m2', 'Overweight', 'NO', '', 'YES', 'Due to Allergic rhinitis Meds: Naphcon A', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Ma. Lourdes L. Mojares', '286 Dr. Sixto Antonio Ave. Caniogan Pasig City', '09178712724', 'Sister', 'Yes, occasionally', 'No', 'Yes, zumba regularly'),
(119, 1, 'ABELLO, JULIETO TORRES', 'PCN150', 'BSG', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '172cm', '', '68.9kg', '', '36.2', 'Normal', '120/100mmHg', 'Normal', '64', 'Normal', '18', 'Normal', '23.3 kg/m2', 'Normal', 'NO', '', 'YES', 'Eye vision with corrective eye glasses Reco: For consultation to Optometrist ', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jennifer Martinez', 'Phase 2 Lorelan Resort Brgy San roque Rizal, Antipolo', '09105539871', 'Spouse', 'No', 'No', 'Yes, walking'),
(120, 97, 'JOMOCAN, MARY MANALIT ABQUILAN', 'PCN111', 'BD3', 'NO', '', 'NO', '', 'NO', 'Family history father side', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Acid Reflux, Kremil-S', 'NO', '', 'NO', '', 'YES', 'skin allergies Meds: Cetirizine', '', 'NO', '', '153 cm', '', '49.4kg', '', '36.4', 'Normal', '170/110', 'High/ For Bp monitoring', '91', 'Normal', '20', 'Normal', '21.1', 'Normal', 'NO', '4 Tattoos', 'NO', 'For Immediate consultation to  ENT', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Sophia Ann Magalona', '420 P. Martinez St. Brgy. Bagong Silang, Mandaluyong', '09614942244', 'Cousin', 'Yes, occasionally', 'Yes, 1 sticks per day', 'Yes, stretching'),
(122, 23, 'BARRAZONA, RUBY ROSE STREBEL', 'PCN137', 'BD3', 'NO', '', 'NO', 'Family history Mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history father side ', 'NO', '', 'YES', 'Headache', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'History of Mild covid-19 two time last,2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Food Intake (bangus)', '', 'YES', 'History of Minor surgery right achilles', '164cm', '', '64kg', '', '36.3', 'Normal', '130/100mmHg', 'Normal', '60', 'Normal', '18', 'Normal', '23.8', 'Normal', 'NO', '', 'YES', 'Eye vision with corrective eye glasses/ history of tonsilitis', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Ivan Paul Sanchez', '2273 F. Calderon St. Sta. Ana Manila', '09999998225', 'Partner', 'Yes, occasionally (7-8 bottles) ', 'Yes, 5 sticks per day/ vaping', 'No'),
(123, 111, 'MARCA, NANCY FONTANILLA', 'PCN3', 'BD3', 'NO', 'History last 2004', 'YES', ' Telmisartan amlodipine 5mg', 'NO', '', 'NO', '', 'NO', '', 'YES', 'With breast cyst (water)', 'NO', '', 'YES', 'Vertigo (Betahistine 16mg)', 'NO', '', 'NO', '', 'NO', 'History 1997', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last September 2022', 'NO', 'History since 7 years old', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Acid Reflux, Kremil-S Advance/ with history of gastritis', 'NO', '', 'NO', '', 'NO', 'Skin allergies due to weather condition', '', 'NO', 'History of surgery removal of gallbladder', '161cm', '', '51.1kg', '', '36.1', 'Normal', '110/80mmHg', 'Normal', '74', 'Normal', '18', 'Normal', '19.7', 'Normal', 'NO', '', 'YES', 'Eye vision with corrective eye glasses 275/275', 'NO', '', 'NO', '', 'YES', 'Diagnose with scoliocis at right upper back  (1992)', 'NO', '', 'NO', '', 'Ramil V. Marca', '23 Caraballo St.  Hacienda Heights, Village Concepcion Dos, Marikina City', '09273403225', 'Spouse', 'Yes, occasionally', 'Yes, 10 sticks per day', 'Yes, workout 30 mins per day'),
(124, 44, 'FORCADILLA, RUBY GACIS', 'PCN266', 'BD1', 'NO', '', 'NO', 'Family history Father side', 'NO', '', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '3 Months Pregnant', '154.5', '', '55kg', '', '36.3', 'Normal', '110/80mmHg', 'Normal', '81', 'Normal', '20', 'Normal', '23.3 kg/m2', 'Normal', 'NO', '', 'NO', 'Eye vision with corrective eye glasses 150/50', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Reineer Esguerra', 'Sapari Bldg. 5 unit 509 Brgy 811 Zone 8 Paco Manila', '09691310449', 'Husband', 'No', 'No', 'No'),
(125, 89, 'VARGAS, KAREN SERA', 'PCN193', 'BD1', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'No medication , Manageable', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '150cm', '', '67.2kg', '', '36.2', 'Normal', '120/80mmHg', 'Normal', '78', 'Normal', '16', 'Normal', '29.9', 'Overweight', 'YES', 'With tattoo  (right arm)', 'YES', 'Recommend to see an Optometrists', 'NO', '', 'NO', '', 'YES', 'Diagnose with mild dextro-scoliocis ', 'NO', '', 'NO', '', 'Felicidad Vargas', 'Blk 24 Lot 4 Ph 3-E1, Dagat-dagatan caloocan City', '09993675223', 'Mother', 'No', 'No', 'No'),
(126, 4, 'ADIAO, PAULA LYN OFEMIA', 'PCN402', 'BD1', 'NO', '', 'YES', 'No Medication, follow-up check up', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'History during pregnancy last 2018', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'With Gallstones, No medication', 'NO', '', 'NO', '', '', 'NO', '', '165cm', '', '67.5kg', '', '36.4', 'Normal', '140/100mmHg', 'Elevated', '83', 'Normal', '20', 'Normal', '24.8', 'Normal', 'YES', 'with Tattoo ( right arm, neck and right leg)', 'YES', 'Weak hearing/ for EENT consultation', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jayson Ofemia', '652 Protacio Ext. Pasay City', '09063789549', 'Brother', 'Yes, occasionally beer drinker', 'Vaping', 'Yes, stretching'),
(127, 85, 'SALTA, JULIE ANN MANTALA', 'PCN370', 'BD1', 'NO', '', 'NO', '', 'YES', 'Glimepiride 2mg, Gemigliptin 50mg, Jardiance duo 1000mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '155cm', '', '70.7kg', '', '36.4', 'Normal', '120/90mmHg', 'Normal', '87', 'Normal', '16', 'Normal', '29.4', 'Over weight', 'NO', '', 'YES', 'Recommend to see an Ophthalmologist', 'NO', '', 'YES', 'Meds: Aspirin', 'NO', '', 'NO', '', 'NO', '', 'Marte Adriano Salenga', '2-2 Bldg. G. Ernestville Hoa Nenita Ext. Brgy. Gulod Nova.. Q.C', '09760068964', 'Live-in Partner', 'Yes, occasionally', 'No', 'No'),
(128, 30, 'BARTOLOME, CLOVEN VERGARA', 'PCN376', 'FINANCE', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of fractured on left wrist since 12 years old', 'NO', '', 'NO', '', 'NO', '', 'NO', 'Family history Mother side Undergone operation gallstone', 'NO', '', 'NO', '', '', 'NO', '', '176cm', '', '83.5kg', '', '36.5', 'Normal', '130/90mmHg', 'Normal', '72', 'Normal', '16', 'Normal', '27', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of lower back pain during workout', 'NO', '', 'NO', '', 'Remy Rose Mayo', 'Jemar Comp., Arty 2, Brgy Talipapa, Novaliches Quezon City', '09392693058', 'Live-in Partner', 'No', 'Yes, vaping', 'yes, workout 5x a week'),
(129, 2, 'CORREA, MARK ANTHONY HERNANDO', 'PCN292', 'FINANCE', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19, 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '161cm', '', '102.1kg', '', '36.1', 'Normal', '140/100mmHg', 'Elevated', '73', 'Normal', '16', 'Normal', '39.4', 'Obese Class II', 'NO', '', 'YES', 'Eye vision with corrective eye glasses', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Mark Christian Correa', '110 P. Zamora St. Caloocan city', '09106374914', 'Brother', 'Yes, occasionally', 'No', 'Yes, walking 3x a week'),
(130, 24, 'CARALDE, MARIAH JANNELLE PALATINO', 'PCN395', 'BD1', 'NO', 'family history live in partner 2019', 'NO', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Skin allergies due to environment', '', 'NO', 'family history father and son pneumonia', '156.5cm', '', '59.9kg', '', '36.3', 'Normal', '120/80mmHg', 'Normal', '80', 'Normal', '24', 'Normal', '24.5', 'Normal', 'NO', '', 'YES', 'with astigmatism', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Jorge Lite', '505 F. Cruz St. Malibay Pasay', '09760677690', 'Live-in Partner', 'Yes, occasionally', 'No', 'No'),
(131, 46, 'GALANG, DENISE ARIANNE ABULENCIA', 'PCN194', 'BD1', 'NO', '', 'NO', '', 'NO', 'Family history mother side', 'NO', 'Family history father side bypass operation', 'NO', '', 'NO', 'Family history father side (Tonsil)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Mild covid-19 last,2020 and 2021', 'YES', 'Due to dust and smoke ; allergic in watermelon Med: Nebulizer and Inhaler', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '158cm', '', '84kg', '', '36.3', 'Normal', '140/100mmHg', 'Elevated', '76', 'Normal', '18', 'Normal', '33.6', 'Obese Class I', 'NO', '', 'YES', 'Astigmatism', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Nina Lorraine Galang', '185 Lopez St. Balungao, Calumpit Bulacan', '09091293789', 'Sister', 'Yes, occasionally', 'No', 'No'),
(132, 81, 'PASCUA, PAMELA LYN DIAZ', 'PCN400', 'BD1', 'NO', '', 'NO', 'Family history Father side', 'NO', 'Family history father side', 'NO', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Ascorbic acid', '160cm', '', '70.4kg', '', '36.2', 'Normal', '110/80mmHg', 'Normal', '104', 'Slightly Above', '18', 'Normal', '27.5', 'Overweight', 'NO', '', 'YES', 'Eye vision with corrective eye glasses 175/150', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Patricia Pascua', 'B4 L15 Avisea Camella, Bignay Valenzuela City', '09618101317', 'Daughter', 'Yes, occasionally', 'No', 'No'),
(133, 13, 'AVILA, HERBILYN CJUAN', 'PCN268', 'BD1', 'NO', '', 'YES', 'Amlodipine 5mg', 'NO', '', 'NO', 'No ECG findings`', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of Mild covid-19 last 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '160cm', '', '65.3kg', '', '36.3', 'Normal', '140/100mmHg', 'Elevated', '81', 'Normal', '16', 'Normal', '25.5', 'Overweight', 'NO', '', 'YES', 'Eye vision with corrective eye glasses 250/50', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Dennis Avila', '21-G Aglipay St. Brgy. Pag-asa Mandaluyong City', '09209150371', 'Husband', 'Yes, occasionally', 'No', 'No'),
(135, 132, 'RAMOS, FREDERICK CANDAZA', 'PCN42', 'BD2', 'NO', '', 'NO', '', 'YES', 'Metformin 500mg', 'NO', '', 'YES', 'Hyperthyroidism with history of radiation (1995)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of Mild covid-19 last January 2020', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Allergic Rhinitis Meds: Cetirizine', '', 'NO', '', '164.5cm', '', '65kg', '', '36.1', 'Normal', '120/90mmHg', 'Normal', '86', 'Normal', '16', 'Normal', '24', 'Normal', 'NO', '', 'YES', 'Nose: Sinusitis ; Eyes with corrective glasses', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Fernan C. Ramos', 'Blk. 2 Lot 9 Camella Greenville Res. Brgy. Tuktukan, Taguig City', '09178931798', 'Brother', 'No', 'Yes, 10 sticks per day', 'No'),
(137, 20, 'CABRERA, JEFFREY SEJAS', 'PCN358', 'BD1', 'NO', '', 'YES', 'No Medication', 'NO', 'Family history father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Skin allergies due to dried fish', '', 'NO', '', '169cm', '', '105.4kg', '', '34.8', 'Normal', '160/120mmhg', 'High/ For Bp monitoring', '92', 'Normal', '20', 'Normal', '36.9', 'Obese Class II', 'NO', '', 'YES', 'Eye vision near sighted no corrective glasses Recommend to see optometrist', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Ginalyne Cabrera', 'Phase 4 Blk. 24 Lot 84 Brgy. Bagtas Lumina Tanza Subd. Cavite ', '09054091700', 'Wife', 'Yes, occasionally', 'Yes, 10 sticks per day', 'No'),
(138, 22, 'BARRAMEDA, JONATHAN MANSANADEZ', 'PCN7', 'BSG', 'NO', '', 'YES', 'Amlodipine 40mg; Losartan 100mg', 'YES', 'Novomix 30 units; Metformin 500mg', 'YES', 'with Angioplasty 2014 Meds: Aspirin 18mg', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Allergic Rhinitis Meds: Nasal Spray; Allergic to Dust', '', 'YES', 'hospitalized wound in the left foot (2023)', '172cm', '', '70.9', '', '36.2', 'Normal', '130/90mmHg', 'Normal', '87', 'Normal', '16', 'Normal', '24', 'Normal', 'NO', '', 'YES', 'History of Surgery of right eye Retinopathy (2021)', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Iris Distajo', 'Brgy. Calao, Prieto- Diaz Sorsogon City', '09300122767', 'Sister', 'No', 'No', 'Yes, walking');
INSERT INTO `profile1` (`id`, `emp_id`, `profile_name`, `profile_id`, `profile_division`, `tubercolosis`, `tubercolosisv`, `hypertension`, `hypertensionv`, `diabetes_mellittus`, `diabetes_mellittusv`, `heart_trouble`, `heart_troublev`, `endocrine_diseases`, `endocrine_diseasesv`, `cancer_tumor`, `cancer_tumorv`, `mental_disorder`, `mental_disorderv`, `frequent_headache`, `frequent_headachev`, `chronic_cough`, `chronic_coughv`, `std`, `stdv`, `hepa_b`, `hepa_bv`, `hepa_a`, `hepa_av`, `aids_hiv`, `aids_hivv`, `covid19`, `covid19v`, `asthma`, `asthmav`, `rheumatism`, `rheumatismv`, `physical_injury`, `physical_injuryv`, `hernia`, `herniav`, `typhoid`, `typhoidv`, `stomach_abdomina`, `stomach_abdominav`, `kidney_bladder`, `kidney_bladderv`, `dizziness`, `dizzinessv`, `allergies`, `allergiesv`, `others`, `othersv`, `othersv1`, `height`, `heightv`, `weightd`, `weightv`, `temp`, `tempv`, `blood_presure`, `blood_presurev`, `pulse_rate`, `pulse_ratev`, `respi`, `respiv`, `bmi`, `bmiv`, `skin`, `skinv`, `ent`, `entv`, `head`, `headv`, `chest`, `chestv`, `back`, `backv`, `genitals`, `genitalsv`, `rectal`, `rectalv`, `ename`, `eaddress`, `econtact`, `erelation`, `drinking`, `smoking`, `exercise`) VALUES
(139, 141, 'CARINO, GEORGE MICHAEL REVILLA', 'PCN184', 'BD1', 'NO', '', 'NO', 'Family history both side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of Mild covid-19 last 2020 & 2021 ', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'YES', 'History of severe tonsilitis, hospitalized last august 2023', '167 cm', '', '88.8', '', '36.3', 'Normal', '120/100mmHg', 'Normal', '110', 'Above normal', '20', 'Normal', '31.8', 'Obese Class I', 'YES', 'With tattoo  (both arm and back), Eyes:  crossed-eyed', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Alexis Carino', '47 Kilyawan St. Nova Quezon City', '09770066127', 'Brother', 'Yes, occasionally', 'Yes, 3 sticks per day', 'No'),
(140, 108, 'AYOP, MANELYN MACARAYAN', 'PCN356', 'BD1', 'NO', '', 'NO', 'Family history Father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Enervon & Myra-E', '148cm', '', '51.5kg', '', '36.3', 'Normal', '110/80mmHg', 'Normal', '84', 'Normal', '20', 'Normal', '23.5', 'Normal', 'NO', '', 'YES', 'Recommend to see an Optometrists', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Charisa Tolentino', 'Blk 18 Lot 9 Sec. 9  Phase 1 Muzon Pabahay 2000 CSJDM Bulacan', '09958497254', 'Sister', 'Yes, occasionally', 'No', 'No'),
(141, 52, 'BERNAS, JHON REY BALANDANG', 'PCN205', 'FINANCE', 'NO', '', 'YES', 'Findings last 2023APE no medication', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of Mild covid-19 last 2021', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '154cm', '', '66.5kg', '', '36.2', 'Normal', '160/110mmHg', 'High/ For Bp monitoring', '104', 'Above normal', '16', 'Normal', '28', 'Overweight', 'YES', 'Tattoo-right arm', 'YES', 'Eyes with corrective glass 125/150', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Mary Joyce Bernas', '10 Kangkong St., F. Martinez St. Brgy. Additionhills, Mandaluyong City', '09778022260', 'Spouse', 'Yes, occasionally', 'No', 'No'),
(142, 127, 'MONTERO, ANNA SHIELA PUREZA', 'PCN118', 'FINANCE', 'NO', '', 'NO', 'Family history mother side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', 'History of Mild covid-19 last 2020', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '153 cm', '', '60.8kg', '', '36.3', 'Normal', '120/90mmHg', 'Normal', '70', 'Normal', '16', 'Normal', '26', 'Overweight', 'YES', '3 Tattoos (Right arm, left shoulder, back of right ear)', 'NO', 'with Astigmatism ', 'NO', '', 'NO', '', 'YES', 'Lower back and clavicle', 'NO', '', 'NO', '', 'Jomar Montero', 'Blk 38B, 10 Kangkong St Brgy. Addition Hills Mandaluyong City', '09985949549', 'Wife', 'No', 'No', 'No'),
(143, 11, 'GUADIZ, APRIL QUILANG', 'PCN382', 'FINANCE', 'NO', '', 'NO', 'Family history Father side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'NO', '', '150cm', '', '44.2kg', '', '36.3', 'Normal', '120/90mmHg', 'Normal', '81', 'Normal', '20', 'Normal', '19.6', 'Normal', 'NO', '', 'YES', 'Eye vision with corrective eye glasses 50/50', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vivian Guadiz', 'B-5 L-10 Saint Mark Valley Homes Patul Santiago City', '09659138166', 'Mother', 'Yes, occasionally', 'No', 'No'),
(144, 94, 'AGABIN, ZHA-ZHA ZARATE', 'PCN354', 'BD1', 'NO', '', 'NO', '', 'NO', 'Family history, Mother side', 'NO', 'Family History both side', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Vitamins', 'YES', 'Vitamin-c with zinc', '164cm', '', '72.8kg', '', '36.3', 'Normal', '120/90mmHg', 'Normal', '80', 'Normal', '18', 'Normal', '27.1', 'Over weight', 'NO', '', 'YES', 'With corrective eyeglasses 100/75', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Bienvenido Agabin Jr.', 'Pinkian 1, Pasong Tamo Quezon City', '0995218210', 'Husband', 'No', 'No', 'No'),
(145, 139, 'TEVAR, FERISH COSTALES', 'PCN122', 'HRD', 'NO', '', 'YES', 'Meds, Amlife 10mg, Avamax 100mg', 'YES', 'Meds, Metformin 500mg, Glimiperide 4mg', 'YES', '2D Echo with Stress Test', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'YES', 'Meds, Serts', 'NO', '', '', 'YES', 'History of Hospitalization due to Prostate Enlargement 2016', '163', '', '70.8', '', '36.2', 'Normal', '160/100mmhg', 'High', '88', 'Normal', '18', 'Normal', '26.6', 'Overweight', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'Kaleena Kiff T. Condez', 'Block 10 Lot 46 San Remo corner San Marino st. Hills of Maia Alta Subd. Bgy. Dalig , Antipolo City', '09665045233', 'Daughter', 'Regular Beer drinker', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pcn_id_number` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'USER',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pcn_id_number`, `firstname`, `middlename`, `lastname`, `email`, `contact_number`, `division`, `username`, `password`, `user_type`, `date_created`) VALUES
(1, 12345678, 'James Philip', 'Amante', 'Gomera', 'jpgomera19@gmail.com', 2147483647, 'STRAT', 'jpgomera19', '$2y$10$ohpIf7Jsswls1R.D50HoVuBhl.upjHYdXKJXnrU4GmGgc4vmHcJi6', 'USER', '2023-11-08 20:17:47'),
(3, 123456, 'jerryboy', 'amante', 'gomera', 'jerryboy123@gmail.com', 2147483647, 'HR', 'jerryboy123', '$2y$10$twitJnJTU3kEaF2g0jIc8eTBrB/o6CMaNnfogrojC1eZlkZNg3rNK', 'USER', '2023-11-08 20:32:33'),
(4, 123112, 'Levi', 'Amante', 'Gomera', 'levimabangis@gmail.com', 2147483647, 'PPI', 'levi123', '$2y$10$0K9wYCq0vVEj8v.9YvKoEOYRf.XHLKLmT0Ri6QfQ7d2Rq5cx2/vsu', 'USER', '2023-11-09 08:21:30'),
(6, 40, 'Deo', 'De Guzman', 'Villavicencio', 'rodeovill@yahoo.com', 2147483647, 'STRAT', 'rodeovill', '$2y$10$RkzPuuo3qN11OT5IYHqPMebi9eSVL7m.yn.tdRm/7DC/T8iOMNfOe', 'ADMIN', '2023-11-13 09:19:05'),
(9, 121, 'jona', 'miraran', 'Villavicencio', 'jovill@yahoo.com', 2147483647, 'FINANCE', 'jona', '$2y$10$lGvMDbuvII7AZDD6vLxZa.yT7nUwuDa/MmW./rd/1T8mqFZcNtOxS', 'USER', '2023-11-16 20:37:56'),
(10, 408, 'Abigael', 'Manansala', 'Policarpio', 'policarpioabigael061582@gmail.com', 2147483647, 'HR', 'Abby061582', '$2y$10$BBuKEyijBnfGtnBhdA2FPOqUXnAedi69LI6FQvEHXNApn4QGTPute', 'USER', '2023-11-17 03:49:57'),
(11, 122, 'Ferish', 'Costales', 'Tevar', 'ferish.tevar@gmail.com', 2147483647, 'HR', 'Ferish', '$2y$10$gmYic8JCU0HmmjyZpYZfEurFYyx/x0N3e.Xp/HpKM9TFyg1d42ujK', 'USER', '2023-11-17 04:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `vitals`
--

CREATE TABLE `vitals` (
  `id` int(11) NOT NULL,
  `info_date` varchar(255) NOT NULL,
  `info_time` varchar(255) NOT NULL,
  `info_id` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `bp1` varchar(255) NOT NULL,
  `pr1` varchar(255) NOT NULL,
  `rr1` varchar(255) NOT NULL,
  `temp1` varchar(255) NOT NULL,
  `os1` varchar(255) NOT NULL,
  `sugar` varchar(255) NOT NULL,
  `heightd` varchar(255) NOT NULL,
  `weightd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vitals`
--

INSERT INTO `vitals` (`id`, `info_date`, `info_time`, `info_id`, `patient_name`, `bp1`, `pr1`, `rr1`, `temp1`, `os1`, `sugar`, `heightd`, `weightd`) VALUES
(1, '17/11/2023', '04:31:04 PM', '150', 'VILLAVICENCIO, RODEO DE GUZMAN', '130/80', '', '', '', '', '', '', ''),
(2, '17/11/2023', '04:31:26 PM', '150', 'VILLAVICENCIO, RODEO DE GUZMAN', '140/80', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `pre_hospital_info`
--
ALTER TABLE `pre_hospital_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile1`
--
ALTER TABLE `profile1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vitals`
--
ALTER TABLE `vitals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `pre_hospital_info`
--
ALTER TABLE `pre_hospital_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile1`
--
ALTER TABLE `profile1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vitals`
--
ALTER TABLE `vitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
