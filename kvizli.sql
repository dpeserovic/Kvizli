-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2020 at 02:56 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kvizli`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `question_id` int(100) NOT NULL AUTO_INCREMENT,
  `correct_answer` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `incorrect_answer1` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `incorrect_answer2` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `incorrect_answer3` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`question_id`, `correct_answer`, `incorrect_answer1`, `incorrect_answer2`, `incorrect_answer3`) VALUES
(1, 'konce', 'lonce', 'ronce', 'tonce'),
(2, 'BMX', 'BMW', 'BMY', 'BMZ'),
(3, 'vijesti', 'filmove', 'sport', 'humorističke serije'),
(4, 'jabuka', 'trešnja', 'kruška', 'banana'),
(5, 'ciglanu', 'pilanu', 'dvoranu', 'toplanu'),
(6, 'preko rijeke', 'piti mlijeka', 'do Osjeka', 'ljubit seke'),
(7, 'Briggitte', 'Barbara', 'Beatrice', 'Bernardette'),
(8, 'foot fault', 'break point', 'pole position', 'tie break'),
(9, 'umjetnim tvorevinama', 'ratovima', 'kiselim kišama', 'nuklearnim otpadom'),
(10, 'astronomiji', 'botanici', 'medicini', 'psihologiji'),
(11, 'dušik', 'kisik', 'ugljik', 'vodik'),
(12, 'Igor Boraska', 'Krešimir Čuljak', 'Ivan Šola', 'Vedran Pavlek'),
(13, 'Pariz', 'Washington', 'Bonn', 'Madrid'),
(14, 'Herostrat', 'Polimik', 'Neron', 'Eteoklo'),
(15, 'gejzira', 'nacionalnog parka', 'vulkana', 'vodopada'),
(16, 'vatre', 'šume', 'vode', 'nabujale rijeke'),
(17, 'bis', 'cis', 'dis', 'fis'),
(18, 'Biševo', 'Brijuni', 'Kornati', 'Mljet'),
(19, 'pridjevima', 'prijedlozima', 'prilozima', 'imenicama'),
(20, 'fićo', 'peglica', 'buba', 'spaček'),
(21, 'Pobješnjeli Max', 'Smrtonosno oružje', 'Umri muški', 'Terminator'),
(22, 'pin', 'pen', 'puk', 'tan'),
(23, 'Klek', 'Japetić', 'Sljeme', 'Sveta gera'),
(24, 'avionom', 'raketom', 'željeznicom', 'žičarom'),
(25, 'Mate Parlov', 'Marijan Beneš', 'Antun Josipović', 'Željko Mavrović'),
(26, 'vulkana', 'božica', 'gradova', 'zračnih luka'),
(27, 'nobelij', 'ajnštajnij', 'fermij', 'kirij'),
(28, 'obratnica', 'polarnica', 'ekvatora', 'meridijana'),
(29, 'hvarsko', 'riječko', 'splitsko', 'dubrovačko'),
(30, 'Priroda i društvo', 'Matematika', 'Zemljopis', 'Tjelesni odgoj'),
(31, 'stan', 'pare', 'ljubavnicu', 'auto'),
(32, 'papirologijom', 'petrologijom', 'parapsihologijom', 'protureformologijom'),
(33, 'osvjetlao obraz', 'omastio konopac', 'digao nos', 'omastio brk'),
(34, 'kvačilo', 'tlačilo', 'vratilo', 'osovinu'),
(35, 'Alkemičar', 'Higijeničar', 'Botaničar', 'Paničar'),
(36, 'bogojavljanje', 'tijelovo', 'duhovi', 'pepelnica'),
(37, 'riječka', 'splitska', 'dubrovačka', 'zagrebačka'),
(38, 'Luka', 'Rita', 'Monika', 'Karla'),
(39, 'Zambezi', 'Kongo', 'Nil', 'Niger'),
(40, 'roda', 'riječnih galebova', 'bjeloglavih supova', 'orlova'),
(41, 'nada', 'ljepota', 'ljubav', 'mudrost'),
(42, 'Venezuela', 'Urugvaj', 'Čile', 'Kolumbija'),
(43, 'Gary Gabelich', 'Chris Novoselich', 'Antony Maglica', 'Mike Grgich'),
(44, 'Istočno od raja', 'Plodovi gnjeva', 'Slatki četvrtak', 'O miševima i ljudima'),
(45, 'Jagoda Burić', 'Nives Kaburić-Kurtović', 'Dubravka Babić', 'Dragica Cvek-Jordan'),
(46, 'šećer', 'sol', 'papar', 'ulje'),
(47, 'kolibri', 'slavuj', 'albatros', 'noj'),
(48, '4', '2', '3', '5'),
(49, 'engleski', 'njemački', 'talijanski', 'francuski'),
(50, 'Šolta', 'Čiovo', 'Lokrum', 'Palagruža'),
(51, '2', '8', '4', '3'),
(52, 'Editte', 'Helga', 'Michelle', 'Yvette'),
(53, 'Vrgorac', 'Rastušje', 'Drinovci', 'Lukovdol'),
(54, 'samba', 'mambo', 'rumba', 'salsa'),
(55, 'Francuska i Engleska', 'Španjolska i Francuska', 'Engleska i Njemačka', 'Njemačka i Rusija'),
(56, 'morske pjene', 'vatre', 'koralja', 'rascvjetale ruže'),
(57, '6', '4', '10', '8'),
(58, 'Vesna Girardi-Jurkić', 'Ljerka Mintas-Hodak', 'Ljilja Vokić', 'Nansi Ivanišević'),
(59, 'patelarni', 'lumbalni', 'abdominalni', 'dentalni'),
(60, 'u Norveškoj', 'u Švedskoj', 'u Finskoj', 'u Danskoj'),
(61, 'kozja staza', 'lovački rog', 'vučja cesta', 'bikovski vrh'),
(62, 'enolog', 'etnolog', 'ekolog', 'epidemiolog'),
(63, 'arka', 'orka', 'barka', 'parka'),
(64, 'Japanci', 'Njemci', 'Kinezi', 'Vijetnamci'),
(65, 'kesten', 'smreka', 'jela', 'tisa'),
(66, 'Robert Koch', 'Wilhelm Roentgen', 'Cesare Lombroso', 'Louis Pasteur'),
(67, 'jamb', 'limb', 'ditiramb', 'romb'),
(68, 'Hušnjatovo brdo', 'Češnjakovo brdo', 'Bošnjakovo brdo', 'Lješnjakovo brdo'),
(69, 'Monica Lewinsky', 'Venus Williams', 'Madonna', 'Jennifer Lopez'),
(70, 'troposfera', 'egzosfera', 'nanosfera', 'termosfera'),
(71, 'jetra', 'štitnjača', 'gušterača', 'hipofiza'),
(72, 'Berlinu', 'Dubrovniku', 'Amsterdamu', 'Londonu'),
(73, 'Galen', 'Juvenal', 'Plaut', 'Plutarh'),
(74, 'ložač', 'putnik', 'cesta', 'vozač'),
(75, 'Krik', 'Grč', 'San', 'Uzdah'),
(76, 'kabla', 'vodovoda', 'vedra neba', 'oceana'),
(77, '10', '5', '50', '100'),
(78, '6', '2', '3', '5'),
(79, 'Porto Novo', 'Porto Staro', 'Porto Visoko', 'Porto Nisko'),
(80, 'meka', 'sporedna', 'pristupačna', 'topla'),
(81, 'pozitiv', 'negativ', 'ablativ', 'komparativ'),
(82, 'Protokol', 'Čvarak', 'Čokolin', 'Grmalj'),
(83, 'Cavtata', 'Vrsara', 'Zadra', 'Omiša'),
(84, 'Finci', 'Danci', 'Šveđani', 'Islanđani'),
(85, 'čajanka', 'uspavanka', 'pijanka', 'kajdanka'),
(86, 'paparazzo', 'cappuccino', 'chiaroscuro', 'calcio'),
(87, 'Sveti Juraj', 'Sveti Jakov', 'Sveti Ivan', 'Sveti Anton'),
(88, 'Victor Hugo', 'Honore De Balzac', 'Gustave Flaubert', 'Emile Zola'),
(89, 'Škorpion ubija', 'U vrelini noći', 'Teška meta', 'Na nišanu snajpera'),
(90, 'bugarski kišobran', 'albanski kišobran', 'rumunjski kišobran', 'njemački kišobran'),
(91, 'zubato sunce', 'ledeno sunce', 'krezubo sunce', 'šiljato sunce'),
(92, '041', '011', '040', '058'),
(93, 'viša sila', 'viši bojnik', 'više božanstvo', 'više njih'),
(94, 'Skup', 'Pomet', 'Stanac', 'Bokčilo'),
(95, 'polutnik', 'ravnodnevnik', 'kolutnik', 'prisojnik'),
(96, 'Gane', 'Kameruna', 'Tunisa', 'Nigerije'),
(97, 'atletici', 'gimnastici', 'umjetničkom klizanju', 'rukometu'),
(98, 'Marseilla', 'Pariza', 'Bordeauxa', 'Strasboura'),
(99, 'fijuk', 'cijuk', 'jauk', 'pijuk'),
(100, 'derviša', 'imama', 'mujezima', 'hodžu'),
(101, 'Ja sam za ples', 'Željo moja', 'Mangup', 'Rock me baby'),
(102, 'zubaru', 'mesaru', 'frizeru', 'bankaru'),
(103, 'Sirije', 'Egipta', 'Libanona', 'Jordana'),
(104, 'vinska mušica', 'bogomoljka', 'krumpirova zlatica', 'pčela'),
(105, 'Mahačkala', 'Baku', 'Taškent', 'Samarkand'),
(106, 'Skandinavskom', 'Apeninskom', 'Balkanskom', 'Arapskom'),
(107, 'pramac', 'krma', 'sidro', 'gat'),
(108, '1', '2', '3', '5'),
(109, 'Finac', 'Škot', 'Poljak', 'Danac'),
(110, '5', '3', '4', '6'),
(111, 'violončelo', 'mandolina', 'kontrabas', 'harfa'),
(112, 'Sumamed', 'Andol', 'Aspirin', 'Plivadon'),
(113, 'Drašković', 'Frankopan', 'Šubić', 'Erdodi'),
(114, 'Portugalac', 'Španjolac', 'Francuz', 'Talijan'),
(115, 'Jozefina', 'Karolina', 'Lujziana', 'Paulina'),
(116, 'Zimbabve', 'Kongo', 'Uganda', 'Mozambik'),
(117, 'Karađoz', 'Siman', 'Džem-sultan', 'Đerzelez'),
(118, 'Namib', 'Gabon', 'Niger', 'Mali'),
(119, 'Čehoslovačke', 'Poljske', 'Bugarske', 'Mađarske'),
(120, 'Pitija', 'Kirka', 'Ifigenija', 'Kasandra'),
(121, 'Istra', 'Brač', 'Korčula', 'Rab'),
(122, 'čelična ptica', 'zlatna ptica', 'bakrena ptica', 'olovna ptica'),
(123, 'bejzbol', 'odbojka', 'hokej', 'nogomet'),
(124, 'imenica', 'glagol', 'pridjev', 'prijedlog'),
(125, 'Kermit', 'Ralf', 'Gonzo', 'Waldorf'),
(126, 'kazališta', 'burze', 'vijećnice', 'sabora'),
(127, 'čašku', 'čokot', 'lisku', 'grozd'),
(128, 'jedriličari', 'sanjkaši', 'motociklisti', 'biciklisti'),
(129, 'Starom Gradu', 'Starigradu', 'Novigradu', 'Biogradu'),
(130, '1024', '1000', '1104', '1011'),
(131, 'orka', 'bijela psina', 'mlat', 'modrulj'),
(132, '1492.', '1496.', '1497.', '1500.'),
(133, 'kroz prozor', 'pod vlak', 'u živo blato', 's mosta'),
(134, 'crvuljak', 'sljepić', 'visuljak', 'crijevuljak'),
(135, 'u Rumunjskoj', 'u Mađarskoj', 'u Poljskoj', 'u Ukrajini'),
(136, 'krupna riba', 'bijela riba', 'slana riba', 'plava riba'),
(137, 'hobi', 'lobi', 'čobi', 'bobi'),
(138, 'kapitalac', 'kapitalist', 'buržuj', 'aristokrat'),
(139, 'Danica', 'Marica', 'Katica', 'Slavica'),
(140, 'balet', 'simfonija', 'mjuzikl', 'opereta'),
(141, 'glumac', 'nogometaš', 'političar', 'arhitekt'),
(142, 'Portugalci', 'Englezi', 'Nizozemci', 'Francuzi'),
(143, 'um', 'sila', 'energija', 'znanje'),
(144, 'čudnovati kljunaš', 'koala', 'plavetni kit', 'dupin'),
(145, 'bushido', 'harakiri', 'kendo', 'aikido'),
(146, 'imperfekt', 'infinitiv', 'imperativ', 'indikativ'),
(147, 'Anica Martinović', 'Iva Radić', 'Fani Ćapalija', 'Jelena Medić'),
(148, 'štapića', 'kuglice', 'grozda', 'spirale'),
(149, 'Molokai', 'Chomolungma', 'Mount Everest', 'Sagarmatha'),
(150, '44,4 milijuna km2', '3,9 milijuna km2', '11 milijuna km2', '105,5 milijuna km2');

-- --------------------------------------------------------

--
-- Table structure for table `guests_highscores`
--

DROP TABLE IF EXISTS `guests_highscores`;
CREATE TABLE IF NOT EXISTS `guests_highscores` (
  `nickname` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `amount_won` int(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `difficulty` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `difficulty`) VALUES
(1, 'Tko ima vlast, taj u rukama drži sve...', 1),
(2, 'Koja se marka odnosi na popularnu vrstu bicikla?', 1),
(3, 'CNN je TV mreža koja 24 sata na dan emitira:', 1),
(4, 'Koje je voće posudilo ime našem otočiću?', 1),
(5, 'Naziv \"opekarna\" odnosi se na:', 2),
(6, 'Ima jedna modra rijeka, valja nama...,u pjesmi Maka Dizdara.', 2),
(7, 'U filmskom je svijetu kao BB znana jedna i jedina...', 3),
(8, 'Kako u tenisu nazivamo prijestup pri izvođenju servisa?', 3),
(9, 'Vukotić je u \"Surogatu\" duhovito prikazao suvremenu civilizaciju preplavljenu:', 4),
(10, 'U čemu je svjetski ugled stekao Korado Korlević?', 4),
(11, 'Što sačinjava dobre 3/4 čistoga zraka?', 5),
(12, 'Koji je hrvatski sportaš nastupio i na ljetnim i na zimskim olimpijskim igrama?', 5),
(13, 'Koji je grad do 1966. prije Bruxellesa bio glavno sjedište NATO-a?', 6),
(14, 'Koji je piroman, željan vječne slave zapalio Artemidin hram u Efezu?', 6),
(15, '\"Old faithful\" ime je najpoznatijeg svjetskog:', 7),
(16, 'Tko se izvrgava opasnosti za drugoga, taj vadi kestene iz...', 1),
(17, 'Nakon odsviranog koncerta gotovo uvijek slijedi...', 1),
(18, 'Koji biser Jadrana nije nacionalni park?', 1),
(19, 'Kojoj vrsti riječi pripada riječ oblačan?', 1),
(20, 'Koji je auto 1991. u Osjeku stradao pod gusjenicama tenka?', 2),
(21, 'Drugi dio kog filmskog serijala je poznat pod nazivom \"Drumski ratnik\"?', 2),
(22, 'Novac na bankomatu nećete moći podignuti ako ste zaboravili...', 3),
(23, 'Koji bi vrh neodoljivo privukao Harryja Pottera?', 3),
(24, 'Polazak Narita, odredište Keflavik-čime putujete?', 4),
(25, 'Koji je Imoćanin rođen u Splitu proslavio Pulu?', 4),
(26, 'Askja, Hekla i Katla imena su islandskih...', 5),
(27, 'Koji od kemijskih elemenata nije nazvan po nobelovcu?', 5),
(28, 'Henry Miller je za opscenost napadan zbog svojih:', 6),
(29, 'Koje je kazalište najstarije u hrvatskoj?', 6),
(30, 'Kako se zove album Dina Dvornika iz 1993. godine?', 7),
(31, 'Akcija u kojoj se ispitivalo porijeklo imovine zvala se: \"Imaš kuću, vrati...', 1),
(32, 'Kojom se znanošću ljudi bave skupljajući razne dokumente?', 1),
(33, 'Tko se u nečem posebno istakao taj je...', 1),
(34, 'Spojka je drugo ime za:', 1),
(35, 'Kojim je romanom Paulo Coehlo stekao svjetsku slavu?', 2),
(36, 'Blagdan Sveta tri kralja poznat je pod nazivom:', 2),
(37, 'Čija je krpica, ako je diploma trogirska, a dekret pakrački?', 3),
(38, 'U svom hitu pjevačica Suzanne Vega počinje ispovjest o zlostavljanju djece:\"My name is...', 3),
(39, 'Preko viktorijinih slapova ruši se rijeka:', 4),
(40, '1994. Zaklada Europske prirodne baštine proglasila je selo Čigoč europskim selom:', 4),
(41, 'Što je posljednje ostalo u pandorinoj kutiji nakon što su iz nje izišla sva zla svijeta?', 5),
(42, 'Koja je južnoamerička država jedina sudjelovala u osnivanju OPEC-a?', 5),
(43, 'Koji je američki Hrvat autom \"Blue Flame\" probio magičnu granicu od 1000 km/h?', 6),
(44, 'Koji se roman Johna Steinbecka temelji na priči o Kainu i Abelu?', 6),
(45, 'Koja je hrvatska umjetnica u svijetu ugled stekla izradom tapiserija?', 7),
(46, 'Što dolazi na kraju u poznatoj uzrečici?', 1),
(47, 'Koja je ptica od navedenih najmanja?', 1),
(48, 'Koliko karata jednake vrijednosti čini poker?', 1),
(49, 'Koji jezik nije službeni švicarski?', 1),
(50, 'Piva klapa ispod volta, s ponistre se vidi...', 2),
(51, 'Na koliko kotača pobjeđuje Lance Armstrong?', 2),
(52, 'Reneova supruga u seriji \"Alo, alo\" zove se:', 3),
(53, 'Koje je mjesto rodno mjesto Tina Ujevića?', 3),
(54, 'Koji od navedenih plesova ne potječe s Kube?', 4),
(55, 'Tko se sukobio u stogodišnjem ratu?', 4),
(56, 'Božica Afrodita rodila se iz...', 5),
(57, 'Koliko nogu ima mrav?', 5),
(58, 'Koja je dama postala prva ministrica u hrvatskoj vladi?', 6),
(59, 'Koji refleks liječnik provjerava, udarajući malim čekićem u čašicu koljena?', 6),
(60, 'Najsjevernija točka europskog kontinenta nalazi se u Finnmarku, pokrajini:', 7),
(61, 'Kako se naziva teško prohodn planinski put?', 1),
(62, 'Vinograd i vino u dobrim su rukama kada o njima brine:', 1),
(63, 'Lađa u kojoj se Noa spasio od potopa je:', 1),
(64, 'Tko je napadom na Pearl Harbour uvukao SAD u 2. svjetski rat?', 1),
(65, 'Koje se bjelogorično drvo uvuklo među crnogorično drveće?', 2),
(66, 'Koji je znanstvenik otkrio bacil tuberkuloze?', 2),
(67, 'Kako se zove dvosložna pjesnička stopa?', 3),
(68, 'Brdo na kojem su pronađeni ostaci krapinskog pračovjeka zove se...', 3),
(69, 'Kako se zove vlasnica haljine o kojoj se 1998. brujilo u cijelom Washingtonu, a i šire?', 4),
(70, 'Kako se zove najgušći dio atmosfere u kojem se zbivaju sve meteorološke promjene?', 4),
(71, 'Koja je žljezda čovječjeg organizma najveća?', 5),
(72, 'Najpoznatiji techno party na svijetu održava se u...', 5),
(73, 'Koji je rimljanin prvi počeo mjeriti puls u dijagnostičke svrhe?', 6),
(74, 'Što u doslovnom prijevodu znači galicizam šofer?', 6),
(75, 'Najpoznatija slika Edvarda Muncha, simbol duhovne tjeskobe modernog čovjeka, jest:', 7),
(76, 'U poznatoj uzrečici kiša pada kao iz:', 1),
(77, 'Koliko dm ima 1 m?', 1),
(78, 'Koji broj u svom imenu krije dvokraki instrument za crtanje kružnice?', 1),
(79, 'Gl. grad Benina je:', 1),
(80, 'Kako nazivamo granicu dviju država koja se prolazi bez većih formalnosti?', 2),
(81, 'Kako se zove prvi stupanj u komparaciji pridjeva?', 2),
(82, 'Kako je prezime Grgi, crtanom liku Ismeta Voljevice?', 3),
(83, 'Naseobinu Epidaur grci su osnovali na mjestu današnjeg:', 3),
(84, 'Koji narod ne govori germanskim jezikom?', 4),
(85, 'Svojevrstan uvod za Američki građanski rat bio je tzv. bostonska:', 4),
(86, 'Nakon Felinijeva filma \"Slatki život\" svijet je postao bogatiji za jedan termin:', 5),
(87, 'Koji svetac je zaštitnik Engleske?', 5),
(88, 'Koji je francuski književnik autor romana \"Zvonar crkve Notrodame\"?', 6),
(89, 'Kako je u nas preveden\"Dirty Harry\" prvi film iz serijala o Prljavom Harryju?', 6),
(90, 'Kako se naziva smrtonosno oružje, kišobran sa zašiljenim vrhom umočenim u otrov?', 7),
(91, 'Kako zovemo hladno sunčano vrijeme praćeno mrazom?', 1),
(92, 'Koji je stari pozivni broj za Zagreb?', 1),
(93, 'Učinimo li nešto zato što tako hoće vis. major,onda tako hoće...', 1),
(94, 'Koji je Držićev lik znan po škrtosti sakrivao tezoro u ćupu?', 1),
(95, 'Koji je naš naziv za Ekvator?', 2),
(96, 'Iz koje afričke države dolazi Kofi Annan, glavni tajnik UN-a?', 2),
(97, 'TV sportska novinarka, ostvarila je uspješnu karijeru u:', 3),
(98, 'Francuska je himna postala popularna zahvaljujući dragovoljcima iz:', 3),
(99, 'Kako nazivamo oštar zvuk koji proizvodi jak vjetar?', 4),
(100, 'Koga je u naslovu svoga romana Meša Selimović suočio sa smrću?', 4),
(101, 'S kojom su pjesmom \"Novi fosili\" na Euroviziji 1987. osvojili 4. mjesto?', 5),
(102, 'Ako je nakon \"Psiha\" traumatično postalo tuširanje, nakon \"Maratonca\" traumatičan je postao odlazak:', 5),
(103, 'Dok je Izraelci nisu okupirali 1967. Golanska visoravan je bila u sastavu:', 6),
(104, 'Koji se kukac latinskog naziva Drosophila melanogaster često upotrebljava u genetičkim pokusima?', 6),
(105, 'Kako se zove glavni grad Uzbekistana?', 7),
(106, 'Na kojem se poluotoku nalazi Švedska?', 1),
(107, 'Kako se naziva prednji dio broda?', 1),
(108, 'Koliko žena ima monogamist?', 1),
(109, 'Što je po narodnosti Mika Hakinnen?', 1),
(110, 'Koliko godina traje mandat predsjednika Hrvatske?', 2),
(111, 'Gudački trio čine violina, viola i', 2),
(112, 'Pod kojim je nazivom javnosti poznatiji Plivin antibiotik Azithromycin?', 3),
(113, 'Koja je velikaška obitelj četiri stoljeća gospodarila Trakošćanom?', 3),
(114, 'Što je po narodnosti istraživač Ferdinand Magellan?', 4),
(115, 'Uobičajeni naziv za cestu od Karlovca do Senja je:', 4),
(116, 'Nekad Južna Rodezija, a danas?', 5),
(117, 'Kako se zove grotekstni lik turskog kazališta sjenki i junak Andrićeve \"Proklete avlije\"?', 5),
(118, 'Koji je od navedenih naziv pustinje, a ne države?', 6),
(119, 'Tomaš Masaryk bio je predsjednik:', 6),
(120, 'Kako je ime Apolonovoj svećenici iz Delfa?', 7),
(121, 'Koji od navedenih nije otok?', 1),
(122, 'Kako se slikovito zove zrakoplov?', 1),
(123, 'Hvatač hvata, bacač baca, udarač udara.Koji je to sport?', 1),
(124, 'Kojoj vrsti riječi pripada riječ kutomjer?', 1),
(125, 'Kako se zove žabac koji predvodi Muppete?', 2),
(126, '\"Zdenac života\" Ivana Meštrovića nalazi se u Zagrebu ispred:', 2),
(127, 'Latice cvijeta čine vjenčić, a lapovi cvijeta:', 3),
(128, 'Tko se natječe u klasi \"optimist\"?', 3),
(129, 'Renesansni ljetnikovac Tvrdalj nalazi se u starom gradu:', 4),
(130, 'Koliko bajtova ima 1 kilobajt?', 4),
(131, 'Koja od navedenih životinja ne spada u skupinu morskih pasa?', 5),
(132, 'Na svoje prvo putovanje Kolumbo kreće:', 5),
(133, 'Češki su evangelici 1618. \"upriličili\" defenestraciju, odnosno bacanje kraljevskoga namjesnika:', 6),
(134, 'Kako se još na hrvatskom kaže \"slijepo crijevo\"?', 6),
(135, 'U kojoj državi žive Krašovani?', 7),
(136, 'Kako se zove vrlo utjecajna osoba?', 1),
(137, 'Kako se zove najmilija zabava u dokolici?', 1),
(138, 'Jelen vrlo razgranatih rogova u lovačkom žargonu zove se:', 1),
(139, 'Kako glasi narodni naziv za Veneru?', 1),
(140, '\"Labuđe jezero\" P.Iliča Čajkovskog je...', 2),
(141, 'Koje zanimanje povezujemo s imenom varaždinca Ljubomira Kerekeša?', 2),
(142, 'Tko je nakon posudbe duge 442 godine,20. prosinca 1999. Makao vratio Kini?', 3),
(143, 'Što je kod Czeslava Milosza zarobljeno, a kod Imanuela Kanta čisto i praktično?', 3),
(144, 'Koji sisavac nese jaja?', 4),
(145, 'Samurajski kodeks zove se...', 4),
(146, 'Glagolski oblici kojima u hrvatskom označavamo prošlost su perfekt, pluskvamperfekt, aorist i...', 5),
(147, 'Koja ljepotica najbolje pristaje uz nogometaša Roberta Kovača?', 5),
(148, 'Bacil je bakterija u obliku:', 6),
(149, 'Koji se od navedenih naziva ne odnosi na najviši vrh na zemlji?', 6),
(150, 'Površina Azije zauzima 1/3 kopnene površine Zemlje bez Antarktike, a to je:', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_highscores`
--

DROP TABLE IF EXISTS `users_highscores`;
CREATE TABLE IF NOT EXISTS `users_highscores` (
  `user_id` int(100) NOT NULL,
  `nickname` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `amount_won` int(100) NOT NULL DEFAULT '0',
  `counter` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
