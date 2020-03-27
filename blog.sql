-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 07:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmeni`
--

CREATE TABLE `adminmeni` (
  `idAdminMeni` int(11) NOT NULL,
  `ime_menija` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `naziv_rute` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ikonica` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminmeni`
--

INSERT INTO `adminmeni` (`idAdminMeni`, `ime_menija`, `naziv_rute`, `ikonica`) VALUES
(1, 'Blog Dashboard', '/admin', 'edit'),
(2, 'Blog Posts', '/admin/posts', 'vertical_split'),
(3, 'Add New Post', '/admin/createpost', 'note_add'),
(4, 'Users', '/admin/users', 'person'),
(5, 'Add New User', '/admin/users/createuser', 'person'),
(6, 'Navigation', '/admin/navigation', 'list'),
(7, 'Actions', '/admin/actions', 'view_week'),
(8, 'Emails', '/admin/emails', 'email'),
(9, 'Comments', '/admin/comments', 'comments');

-- --------------------------------------------------------

--
-- Table structure for table `akcije`
--

CREATE TABLE `akcije` (
  `idAkcije` int(11) NOT NULL,
  `datum_akcije` datetime NOT NULL,
  `akcija` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `akcije`
--

INSERT INTO `akcije` (`idAkcije`, `datum_akcije`, `akcija`) VALUES
(1, '2020-03-26 20:51:24', 'User logged out'),
(2, '2020-03-26 20:51:38', 'User logged in'),
(3, '2020-03-26 21:04:29', 'delete user'),
(4, '2020-03-26 21:04:36', 'update user'),
(5, '2020-03-25 00:00:00', 'delete user'),
(6, '2020-03-27 00:00:00', 'update user'),
(7, '2020-03-27 00:21:04', 'update post'),
(8, '2020-03-27 00:22:16', 'update post'),
(9, '2020-03-27 00:26:46', 'update post'),
(10, '2020-03-27 00:28:10', 'update post'),
(11, '2020-03-27 00:28:38', 'update post'),
(12, '2020-03-27 00:29:08', 'update post'),
(13, '2020-03-27 00:31:37', 'create post'),
(14, '2020-03-27 00:32:04', 'delete post'),
(15, '2020-03-27 00:32:23', 'create user'),
(16, '2020-03-27 00:32:35', 'update user'),
(17, '2020-03-27 00:32:38', 'delete user'),
(18, '2020-03-27 00:32:47', 'create nav'),
(19, '2020-03-27 00:32:52', 'update nav'),
(20, '2020-03-27 00:32:54', 'delete nav'),
(21, '2020-03-27 00:37:26', 'update post'),
(22, '2020-03-27 00:40:52', 'update post'),
(23, '2020-03-27 00:41:07', 'update post'),
(24, '2020-03-27 00:41:38', 'update post'),
(25, '2020-03-27 00:42:06', 'update post'),
(26, '2020-03-27 00:42:35', 'create comment'),
(27, '2020-03-27 00:42:38', 'create comment'),
(28, '2020-03-27 00:42:42', 'create comment'),
(29, '2020-03-27 00:42:50', 'User logged out'),
(30, '2020-03-27 12:11:44', 'User logged in'),
(31, '2020-03-27 12:13:03', 'update post'),
(32, '2020-03-27 12:13:15', 'update post'),
(33, '2020-03-27 13:01:04', 'User logged out'),
(34, '2020-03-27 14:13:56', 'User logged in'),
(35, '2020-03-27 15:17:39', 'create comment'),
(36, '2020-03-27 15:17:45', 'create comment'),
(37, '2020-03-27 15:17:56', 'create comment'),
(38, '2020-03-27 15:18:02', 'create comment'),
(39, '2020-03-27 15:51:43', 'create comment'),
(40, '2020-03-27 16:00:58', 'User logged out'),
(41, '2020-03-27 16:01:08', 'User logged in'),
(42, '2020-03-27 16:14:57', 'create comment'),
(43, '2020-03-27 16:22:55', 'create comment'),
(44, '2020-03-27 16:23:03', 'create comment'),
(45, '2020-03-27 16:23:10', 'User logged out'),
(46, '2020-03-27 16:54:09', 'Create user'),
(47, '2020-03-27 16:54:20', 'User logged in'),
(48, '2020-03-27 16:55:52', 'create comment'),
(49, '2020-03-27 16:55:57', 'create comment'),
(50, '2020-03-27 16:56:06', 'create comment'),
(51, '2020-03-27 16:57:35', 'User logged out'),
(52, '2020-03-27 16:58:54', 'User logged in'),
(53, '2020-03-27 16:59:24', 'update post'),
(54, '2020-03-27 16:59:45', 'update post'),
(55, '2020-03-27 17:00:02', 'create post'),
(56, '2020-03-27 17:00:15', 'delete post'),
(57, '2020-03-27 17:01:08', 'delete user'),
(58, '2020-03-27 17:01:42', 'update user'),
(59, '2020-03-27 17:01:50', 'update user'),
(60, '2020-03-27 17:02:06', 'update user'),
(61, '2020-03-27 17:02:17', 'delete user'),
(62, '2020-03-27 17:02:32', 'create nav'),
(63, '2020-03-27 17:02:39', 'update nav'),
(64, '2020-03-27 17:02:41', 'delete nav'),
(65, '2020-03-27 17:08:56', 'create comment'),
(66, '2020-03-27 17:09:01', 'create comment'),
(67, '2020-03-27 17:09:14', 'create comment'),
(68, '2020-03-27 17:09:26', 'create comment'),
(69, '2020-03-27 17:09:30', 'create comment'),
(70, '2020-03-27 17:09:34', 'create comment'),
(71, '2020-03-27 17:09:38', 'create comment'),
(72, '2020-03-27 17:10:41', 'create user'),
(73, '2020-03-27 17:11:12', 'create user'),
(74, '2020-03-27 17:11:29', 'create user'),
(75, '2020-03-27 17:14:03', 'create post'),
(76, '2020-03-27 17:14:38', 'create user'),
(77, '2020-03-27 17:17:44', 'create post'),
(78, '2020-03-27 17:18:37', 'create comment'),
(79, '2020-03-27 17:18:50', 'create comment'),
(80, '2020-03-27 17:19:01', 'create comment'),
(81, '2020-03-27 18:04:16', 'update post'),
(82, '2020-03-27 18:04:35', 'update post'),
(83, '2020-03-27 18:04:50', 'create post'),
(84, '2020-03-27 18:04:57', 'delete post'),
(85, '2020-03-27 18:05:05', 'update user'),
(86, '2020-03-27 18:05:25', 'create user'),
(87, '2020-03-27 18:05:32', 'delete user'),
(88, '2020-03-27 18:05:40', 'create nav'),
(89, '2020-03-27 18:05:45', 'update nav'),
(90, '2020-03-27 18:05:47', 'delete nav');

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `idArtikla` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime(6) NOT NULL,
  `idKategorije` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `idSlike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`idArtikla`, `naslov`, `tekst`, `datum`, `idKategorije`, `idAdmin`, `idSlike`) VALUES
(1, 'Melania Trump cancels California fundraiser', '<p>First lady Melania Trump has cancelled a California fundraiser she was to hold next week, the White House confirmed. White House press secretary Stephanie Grisham said in a text message that the first lady would not be holding a previously scheduled March 18 fundraiser in Beverly Hills. She said the decision was due to a &ldquo;scheduling conflict. The move comes amid mounting concerns about the coronavirus. Los Angeles County, where the event was to be held, has declared a state of emergency over</p>', '2020-03-09 14:23:29.632257', 1, 1, 63),
(2, 'Health secretary pushes cruise ship shutdown amid coronavirus crisis', 'HHS Secretary Alex Azar has urged the White House to actively discourage Americans from boarding cruise ships to prevent the further spread of coronavirus, two people with knowledge of the conversations said.\r\n\r\nThe cruise ships have been a focal point in the outbreak, with more than 700 cases linked to the Diamond Princess cruise ship, which was quarantined off the coast of Japan for two weeks, and at least 21 more confirmed aboard the Grand Princess cruise ship that is set to dock in Oakland, ', '2020-03-02 07:23:29.632257', 1, 9, 2),
(3, 'Coronavirus: La Liga matches & Barca Champions League game behind closed doors', 'Matches in Spain\'s top two divisions will be played behind closed doors for at least the next two weeks because of coronavirus concerns.\r\n\r\nThe change will take effect from Tuesday, with fans now banned from the game between Eibar and Real Sociedad.\r\n\r\nLa Liga acted on guidance from Spain\'s ministry of health and the country\'s sports council.\r\n\r\nBarcelona\'s Champions League match against Napoli on 18 March will also be played at an empty Nou Camp.\r\n\r\n\"The decision has been made strictly for heal', '2020-03-10 14:41:47.515468', 2, 1, 3),
(4, 'Jude Bellingham: Birmingham teenager takes Man Utd training ground tour', '<p>Birmingham City&#39;s teenage midfielder Jude Bellingham made a visit to Manchester United&#39;s Carrington training ground on Monday. Bellingham, 16, has attracted interest from clubs domestically and abroad, including United and Borussia Dortmund. Blues have expressed the hope that they can keep Bellingham, who is not allowed to sign a professional contract until June, when he turns 17. However, that seems unlikely given the status of the interested clubs. &#39;Half of Europe was there to watc</p>', '2020-03-09 06:34:23.117257', 2, 1, 52),
(5, 'Even a weird hypernucleus confirms a fundamental symmetry of nature', 'An exotic version of an atomic nucleus is doing double duty. A study of the hypertriton simultaneously confirms a basic symmetry of nature and potentially reveals new insights into what lurks inside ultradense neutron stars. \r\n\r\nThe hypertriton is a twin of the antihypertriton — the antimatter version of the nucleus. Both hypernuclei have the same mass, researchers with the STAR Collaboration report March 9 in Nature Physics. \r\n\r\nA hypernucleus is an atomic nucleus in which a proton or neutron h', '2020-02-28 11:32:16.281346', 4, 1, 5),
(6, '‘Go Big’ on Coronavirus Stimulus, Trump Says, Pitching Checks for Americans', 'WASHINGTON — The Trump administration called on Tuesday for urgent action to speed $1 trillion into the economy, including sending $250 billion worth of checks to millions of Americans, as the government prepared its most powerful tools to fight the coronavirus pandemic and an almost certain recession.\r\n\r\nThe Federal Reserve took the rare step of unleashing its emergency lending powers and President Trump called on Congress to quickly approve the sweeping economic stimulus package. Mr. Trump dispatched his Treasury secretary to Capitol Hill to begin hammering it out as large sections of the economy shut down and companies began laying off workers.\r\n\r\nWith markets experiencing levels of volatility not seen since the 2008 financial crisis, the White House vowed to use every weapon at its disposal to combat the crisis.\r\n\r\n“We want to go big,” Mr. Trump said at a news conference at the White House, adding that he had instructed the Treasury secretary, Steven Mnuchin, to introduce measures that would provide more immediate economic support than the payroll tax cut holiday he had been promoting.', '2020-03-18 11:31:33.619689', 1, 1, 6),
(7, '4 Takeaways From Tuesday’s Democratic Primaries', 'Joseph R. Biden Jr. swept the three states that voted Tuesday: Florida, Illinois and Arizona. Bernie Sanders lost ground badly in the delegate count. And the coronavirus pandemic continued to wreak havoc on the most basic facets of American life, threatening to disrupt if not derail the remaining primary calendar.\r\n\r\nWith nearly 60 percent of the delegates allocated in the race for the Democratic presidential nomination, Mr. Biden holds a commanding lead of nearly 300 delegates over Mr. Sanders — a sum that makes it statistically improbable that Mr. Sanders could ever catch up.\r\n\r\n“Is this race over?” Representative Hakeem Jeffries of New York, the House Democratic caucus chairman, asked on Twitter Tuesday night.\r\n\r\nIn a sign of his diminished standing, Mr. Sanders did not even try to spin the results for the second straight week, choosing to make no public remarks after the states were called.\r\n\r\n', '2020-03-18 22:59:51.829822', 1, 1, 7),
(8, 'The Bernie Sanders Revolution Has Moved to Mom’s Couch', '<p>With the country in crisis mode, Melat Eskender, 19, has assumed battle position: In her parents&rsquo; living room making phone calls for Senator Bernie Sanders, with quarantine rations of Flamin&rsquo; Hot Cheetos at her side. The coronavirus outbreak has scattered college students across the country. Thousands left their campuses to return to their childhood bedrooms, as universities have announced that they are moving to remote learning and recommending, or requiring, that students leave. For many, that can mean a wistful sense of time lost with friends and school rituals missed, not to mention cabin fever. But there&rsquo;s an upside, as Ms. Eskender put it: &ldquo;Being isolated in my home and not having classes, it gives me time to focus on this campaign.&rdquo; Ms. Eskender, a Yale freshman from Columbus, Ohio, believes that the Covid-19 pandemic has put a spotlight on Mr. Sanders&rsquo;s strengths as a candidate, both in his health care-focused policy platform and leadership style. &ldquo;I don&rsquo;t see him as an authoritative leader, I see him as a healer,&rdquo; Ms. Eskender said. &ldquo;His policies and leadership are what the country need right now.&rdquo; For many young Sanders supporters, recent weeks have brought a sense of angst and grief: Their preferred candidate&rsquo;s shot at the nomination has rapidly declined, as the country has been swept into a public health disaster. And the coronavirus pandemic has underscored their belief in Mr. Sanders&rsquo;s &ldquo;Medicare for all&rdquo; plan, just as his chance of election seems more elusive than ever. He is behind former Vice President Joseph R. Biden, who ended Tuesday with victories in Florida, Illinois and Arizona &mdash; and overtures to the Sanders base in remarks over a livestream from his home in Delaware. &ldquo;Let me say especially to the young voters who have been inspired by Senator Sanders: I hear you.&rdquo;</p>', '2020-03-18 08:24:24.322307', 1, 1, 54),
(29, 'Watch this teacher give a geometry lesson in Half-Life: Alyx', 'Charles Coomber of San Diego yesterday took an innovative approach to teaching his 7th grade class geometry while in quarantine: conduct the whole lesson from inside Half-Life: Alyx.\r\n\r\nHalf-Life: Alyx was released on Sunday March 23. Coomber, however, was familiar enough with the game by the following day to not only know where to find working marker pens, a dry-wipe eraser, and a suitable surface to write on; but to also have his in-game handwriting down to an enviable level of legibility.\r\n\r\nThe video of the lesson was posted to YouTube yesterday and has already received over 200,000 views at the time of writing. That\'s 200,000 people—many of us presumably well past the 12-13 age group of the intended audience—tricked into learning about geometry through the novelty of VR.\r\nAnyone looking for a straightforward let\'s play of the game presumably came away disappointed—after a quick glance out at City 17, Coomber remains admirably committed to actually using the game to teach a class, and restricts himself to the rooftop greenhouse whose windows make for a good makeshift whiteboard.\r\n\r\nBut the temptation to stick around for the whole video (which is, after all, only 17 minutes long) in order to get a look at the game—and have fun learning a thing or two about geometry at the same time—is a strong one. Plus, Coomber rewards those who stay to the end with a quick tour of his (well, Alyx\'s) in-game apartment, including a brief introduction to some unusual neighbours and an equally quirky pet.\r\n\r\nCoomber isn\'t the only person making creative use of Half-Life: Alyx\'s brief but immersive intro sequence; if you\'re looking for ideas, check out our antics in 8 other fun things to do in the Half-Life: Alyx intro. In addition having fun writing on the glass, there are a few little Easter Eggs harking back to older Half-Life games to uncover; as well as a variety of fun and interesting ways to mess with the pigeons on your roof, mess with cops outside your apartment, mess with innocent citizens who made the mistake of going about their day underneath your balcony.', '2020-03-25 11:34:00.413592', 3, 1, 36),
(30, 'Pearl Jam continue to tease fans with snippets from new album – hear ‘Never Destination’', '<p><a href=\"https://www.nme.com/artists/pearl-jam\">Pearl Jam</a>&nbsp;have shared another snippet of a song from&nbsp;<a href=\"https://www.nme.com/news/music/pearl-jam-announce-new-studio-album-gigaton-2596300\">&lsquo;Gigaton&rsquo;</a>, their forthcoming eleventh album.</p>\r\n\r\n<p>The veteran rockers teased &lsquo;Never Destination&rsquo; (listen below) a few days after sharing a few seconds from&nbsp;<a href=\"https://www.nme.com/news/music/listen-to-a-snippet-of-pearl-jams-new-track-who-ever-said-2627841\">&lsquo;Who Ever Said&rsquo;</a>. Both tracks appear on the band&rsquo;s first album in seven years, which is released this Friday (March 27).</p>\r\n\r\n<p>Pearl Jam&rsquo;s &lsquo;Gigaton&rsquo; consists of 12 tracks including &lsquo;Never Destination&rsquo;, &lsquo;Buckle Up&rsquo; and &lsquo;Come Then Goes&rsquo; &ndash; see the full tracklist below.</p>\r\n\r\n<p><strong>1. &lsquo;Who Ever Said&rsquo;</strong><br />\r\n<strong>2. &lsquo;Superblood Wolfmoon&rsquo;</strong><br />\r\n<strong>3. &lsquo;Dance of the Clairvoyants&rsquo;</strong><br />\r\n<strong>4. &lsquo;Quick Escape&rsquo;</strong><br />\r\n<strong>5. &lsquo;Alright&rsquo;</strong><br />\r\n<strong>6. &lsquo;Seven O&rsquo;Clock&rsquo;</strong><br />\r\n<strong>7. &lsquo;Never Destination&rsquo;</strong><br />\r\n<strong>8. &lsquo;Take The Long Way&rsquo;</strong><br />\r\n<strong>9. &lsquo;Buckle Up&rsquo;</strong><br />\r\n<strong>10. &lsquo;Come Then Goes&rsquo;</strong><br />\r\n<strong>11. &lsquo;Retrograde&rsquo;</strong><br />\r\n<strong>12. &lsquo;River Cross&rsquo;</strong></p>\r\n\r\n<p>Discussing the LP, guitarist Mike McCready explained that making the record had been &ldquo;a long journey&rdquo; for the group.</p>\r\n\r\n<p>&ldquo;It was emotionally dark and confusing at times, but also an exciting and experimental road map to musical redemption,&rdquo; he said. &ldquo;Collaborating with my bandmates on &lsquo;Gigaton&rsquo; ultimately gave me greater love, awareness and knowledge of the need for human connection in these times.&rdquo;</p>\r\n\r\n<p>The band are among dozens of acts who have been forced to postpone their upcoming tour dates as the crisis coronavirus continues. The first leg of their &lsquo;Gigaton&rsquo; stint was due to kick-off on March 18 in Toronto.</p>\r\n\r\n<p>&ldquo;We are so sorry&hellip; And deeply upset.. If anyone out there feels the same based on this news, we share that emotion with you,&rdquo; the band said of the news.</p>\r\n\r\n<p>See NME&rsquo;s up-to-date list of concert and tour cancellations/postponements&nbsp;<a href=\"https://www.nme.com/blogs/coronavirus-every-cancelled-gig-tour-festival-how-to-ticket-refund-2624274\">here</a>.</p>', '2020-03-26 12:06:46.000000', 5, 1, 37),
(31, 'Dua Lipa – ‘Future Nostalgia’ review: powerful pop perfection from a star unafraid to speak her mind', '<p><a href=\"http://nme.com/artists/dua-lipa\">Dua Lipa&rsquo;</a>s self-titled 2017&nbsp;<a href=\"https://www.nme.com/reviews/dua-lipa-review-2082472\">debut album</a>&nbsp;presented us with a thoroughly modern pop star. She built gigantic choruses off of online acronyms (&lsquo;IDGAF&rsquo;) and rewrote the rulebook for getting over your shitty ex in the digital age (&lsquo;New Rules&rsquo;). As if to reinforce that, the latter has recently seen a resurgence on the bite-sized video app TikTok.</p>\r\n\r\n<p>And now? &ldquo;<em>You want what now looks like / Let me give you a taste</em>,&rdquo; she purrs on the title track from her second album. Things aren&rsquo;t quite as straightforward as that this time around though &ndash; on the new record she gives us her 2020 vision through the lens of the music she grew up listening to. That includes the likes of&nbsp;<a href=\"http://nme.com/artists/outkast\">Outkast</a>,&nbsp;<a href=\"http://nme.com/artists/no-doubt\">No Doubt</a>,&nbsp;<a href=\"http://nme.com/artists/prince\">Prince</a>,&nbsp;<a href=\"http://nme.com/artists/blondie\">Blondie</a>,&nbsp;<a href=\"http://nme.com/artists/jamiroquai\">Jamiroquai</a>&nbsp;and Moloko, but the album&rsquo;s predominant sound is disco.&nbsp;<a href=\"https://www.nme.com/news/music/dua-lipa-studio-nile-rodgers-second-album-2471588\">Lipa even hit the studio with legend Nile Rodgers</a>&nbsp;and, although his contributions didn&rsquo;t make the final cut, you can hear his influence throughout.</p>\r\n\r\n<p>&lsquo;Levitating&rsquo; struts on a rubbery bassline and syncopated handclaps, the 24-year-old pop star singing of a love &ldquo;<em>written in the stars</em>&rdquo;. &lsquo;Pretty Please&rsquo; strips back the layers to focus on gently throbbing bass, synth flashes occasionally making their presence felt and updating things from &lsquo;70s disco to late &lsquo;90s/early &lsquo;00s dance-pop. &lsquo;Love Again&rsquo; follows suit, sampling &lsquo;Your Woman&rsquo; by &lsquo;90s alt. dance star White Town, while &lsquo;Break My Heart&rsquo; interpolates INXS&rsquo; hit &lsquo;Need You Tonight&rsquo;.</p>\r\n\r\n<p>Lipa has long been known as an outspoken artist, standing up for what she believes IN including women&rsquo;s rights. The female experience is one colours &lsquo;Future Nostalgia&rsquo; from start to finish, be that through a sense of empowerment or observations on the inequality women face. &ldquo;<em>No matter what you do, I&rsquo;m gonna get it without ya / I know you ain&rsquo;t used to a female alpha</em>,&rdquo; she asserts on the title track. The confidence in her voice gives you no reason to doubt her.</p>\r\n\r\n<p>All the way through this album, the pop star is in the driving seat, both behind the scenes and in the situations she describes in the lyrics. On &lsquo;Break My Heart&rsquo; &ndash; which she recently&nbsp; described on recent Instagram Live as &ldquo;my forte, dance crying&rdquo; &ndash; she questions whether a new love is going to leave her nursing a broken heart again. But it&rsquo;s her decision to open herself up to that possibility, making herself vulnerable but stronger for it. Then there&rsquo;s last year&rsquo;s stone-cold banger &lsquo;Don&rsquo;t Start Now&rsquo;, a kind of counterpart to &lsquo;New Rules&rsquo; that finds her delivering instructions to an ex: &ldquo;<em>Don&rsquo;t show up/Don&rsquo;t come out/Don&rsquo;t start caring about me now.</em>&rdquo; It&rsquo;s powerful pop perfection.</p>\r\n\r\n<p>Later, on &lsquo;Good In Bed&rsquo;, Lipa crafts a summery, jaunty pop earworm on which she talks about getting &ldquo;<em>good pipe in the moonlight</em>&rdquo;. It might be a distinctly unsexy way of talking about getting laid but that&rsquo;s kind of the point &ndash; this is the star continuing the work of her heroes and singing about her hook-ups in the same frank terms as men without being labelled in derogatory terms. Let&rsquo;s get it, Dua!</p>\r\n\r\n<p>On the flipside of Lipa&rsquo;s empowering stance is &lsquo;Boys Will Be Boys&rsquo;, a string-laden slow cut that tackles sexual harassment. &ldquo;<em>It&rsquo;s second nature to walk home before the sun goes down / And put your keys between your knuckles when there&rsquo;s boys around</em>,&rdquo; Lipa sings, demonstrating some of the things women have to think about in their day-to-day lives. &ldquo;<em>Boys will be boys/The girls will be women</em>,&rdquo; she adds later. Her point is clear &ndash; girls have to grow up much faster than their male peers, who largely get to remain blissfully oblivious to the violence of the world until a later age. Meanwhile their female friends have their childhood bubbles burst by self-defence tips.</p>', '2020-03-26 12:18:34.000000', 5, 1, 38),
(32, 'Birds of Prey Comic Writer Gail Simone Isn\'t A Fan Of Jared Leto\'s Joker', '<p>Gail Simone, the&nbsp;<a href=\"https://screenrant.com/tag/birds-of-prey/\"><strong><em>Birds of Prey</em></strong></a>&nbsp;comic writer, isn&#39;t a fan of Jared Leto&#39;s Joker. There have been a handful of actors to take on the Joker over the years, starting with Cesar Romero in Adam West&#39;s &#39;60s&nbsp;<a href=\"https://screenrant.com/tag/batman/\"><em>Batman</em></a><em>&nbsp;</em>TV series. Jack Nicholson was the next big actor to take on the role in 1989, followed by Heath Ledger in Christopher Nolan&#39;s&nbsp;<a href=\"https://screenrant.com/tag/the-dark-knight/\"><em>The Dark Knight</em></a>. Eight years after Ledger&#39;s Academy Award-winning performance, the Joker was recast again in 2016 with Leto taking on the role.</p>\r\n\r\n<p>While Leto is also an Oscar-winning actor, his version of the Joker was less than well-received by fans. Fan backlash started soon after&nbsp;<a href=\"https://screenrant.com/jared-leto-joker-official-image-tattoos/\">Joker&#39;s official look</a>&nbsp;was revealed for&nbsp;<a href=\"https://screenrant.com/tag/suicide-squad/\"><em>Suicide Squad</em></a>, which showed the Joker with several tattoos (including the word &quot;Damaged&quot; on his forehead) and a set of grillz. Upon the release of&nbsp;<em>Suicide Squad</em>, the character was even more heavily criticized, partly because of how little the Joker was in the film. Fans weren&#39;t thrilled with this version of the Clown Prince of Crime, and they weren&#39;t the only ones.</p>\r\n\r\n<p>After responding to a fan on Twitter,&nbsp;<a href=\"https://twitter.com/GailSimone/status/1242998178057609218\" target=\"_blank\">Simone</a>&nbsp;briefly talked about Leto&#39;s Joker saying,&nbsp;<em>&quot;I don&#39;t love it, it&#39;s okay.&quot;&nbsp;</em>Simone started working on the&nbsp;<em>Birds of Prey&nbsp;</em>comics in 2003 and would later work on other DC heroes like Wonder Woman and Batgirl. Simone has an extensive career in the comic industry, but she is most known for her few years working on&nbsp;<em>Birds of Prey</em>.</p>\r\n\r\n<p>With the reception of&nbsp;<em>Suicide Squad</em>&#39;s Joker, it seems highly unlikely at this point that&nbsp;<a href=\"https://www.cbr.com/jared-leto-joker-suicide-squad/\" target=\"_blank\">Leto&#39;s Joker will return</a>, especially now that&nbsp;Joaquin Phoenix&#39;s movie<em>&nbsp;</em>has received glowing reviews and won two Academy Awards.&nbsp;<em>Joker&nbsp;</em>is said to be a standalone film outside of the DCEU, so it&#39;s possible Leto could return at some point. That being said, the back of&nbsp;<a href=\"https://screenrant.com/birds-prey-movie-joker-actor-not-jared-leto-johnny-goth/\">Joker was only briefly seen in&nbsp;</a><em><a href=\"https://screenrant.com/birds-prey-movie-joker-actor-not-jared-leto-johnny-goth/\">Birds of Prey</a>,&nbsp;</em>and Leto didn&#39;t even play the character.&nbsp;<em><a href=\"https://screenrant.com/tag/suicide-squad-2/\">The Suicide Squad</a>&nbsp;</em>director, James Gunn, also recently reported that&nbsp;<a href=\"https://screenrant.com/james-gunn-favorite-joker-actor-ledger-phoenix/\">Leto wasn&#39;t his favorite Joker</a>, which&nbsp;further supports the claim that Leto won&#39;t appear in the sequel.</p>\r\n\r\n<p>While Leto&#39;s Joker received a lot of hate, it can be a bit unfair to judge Leto&#39;s performance based on how the character was designed and written for&nbsp;<em>Suicide Squad</em>. Leto has proven himself as an actor through films like&nbsp;<em>Requiem</em><em>&nbsp;for a Dream&nbsp;</em>and&nbsp;<a href=\"https://screenrant.com/tag/dallas-buyers-club/\"><em>Dallas Buyer&#39;s Club</em></a>, the latter of which won him an Academy Award. Because Joker was barely in&nbsp;<em>Suicide Squad</em>, DC didn&#39;t have an opportunity to develop the character or even let Leto&#39;s acting ability shine, and Joker&#39;s role in&nbsp;<em><strong>Birds of Prey</strong></em>&nbsp;(not played by Leto) didn&#39;t add anything to his character arc. Because of this, many people&#39;s views of Leto&#39;s Joker are probably on par with Simone.</p>', '2020-03-26 12:22:59.000000', 6, 1, 39),
(33, 'Squid edit their genetic material in a uniquely weird place', '<p>Squid can edit their genetic information in a place scientists didn&rsquo;t expect.</p>\r\n\r\n<p>Longfin inshore squid (<em>Doryteuthis pealeii</em>) are the first known animals that can tweak strings of RNA outside of a nerve cell&rsquo;s nucleus. These genetic couriers, called messenger RNA, or mRNA, carry a cell&rsquo;s blueprints for building proteins.</p>\r\n\r\n<p>All creatures make edits to RNA &mdash; including other types besides mRNA &mdash; and do so sparingly, based on limited studies in mammals and fruit flies. Those changes typically take place inside the nucleus and are then exported to the rest of the cell.</p>\r\n\r\n<p>The&nbsp;<a href=\"https://academic.oup.com/nar/advance-article/doi/10.1093/nar/gkaa172/5809668\">squids&rsquo; ability to make genetic edits in cytoplasm</a>, the jellylike material that makes up much of a cell, may let the animals make adjustments to mRNAs on the fly. That skill could help squids produce proteins tailored to meet a cell&rsquo;s needs and hone crucial cell processes, researchers report March 23 in&nbsp;<em>Nucleic Acids Research</em>.</p>\r\n\r\n<p>Knowing how the squids make the edits in nerve cells could help researchers hijack the technique to develop therapeutics for health conditions such as chronic pain by genetically editing cells that create inappropriate pain signals, says Joshua Rosenthal, a biologist at the Marine Biological Laboratory in Woods Hole, Mass. The method would be much like the DNA-editing technique CRISPR, but for RNA.</p>\r\n\r\n<p>In the new study, Rosenthal and colleagues first looked at where an mRNA-editing protein is found in squid nerve cells, or neurons. The team discovered that the protein, called ADAR2, is located in both the jellylike cytoplasm and the nucleus of squid neurons, a hint that the protein could edit mRNAs in both areas.</p>\r\n\r\n<p>The team then extracted cytoplasm from squid axons &mdash; the slender stalk of a neuron &mdash; &ldquo;kind of like you&rsquo;re squeezing toothpaste out of the tube,&rdquo; Rosenthal says. ADAR2 extensively edited an mRNA within the cytoplasm siphoned from the axons, which help send electrical impulses along nerve cells, the researchers found.</p>\r\n\r\n<p>Developing an RNA-editing technique similar to CRISPR could come with key advantages.&nbsp; While CRISPR-generated&nbsp;<a href=\"https://www.sciencenews.org/article/new-crispr-gene-editors-can-fix-rna-and-dna-one-typo-time\">edits in DNA are permanent</a>, RNA is transient, and edited genetic information would disappear when the RNA is broken down in the cell (<em>SN: 10/25/17</em>).</p>\r\n\r\n<p>&ldquo;There are a lot of advantages for trying to manipulate genetic information in RNA,&rdquo; Rosenthal says. &ldquo;If you make a mistake, it&rsquo;s not nearly so dangerous. If you make mistakes in DNA, you&rsquo;re stuck with it.&rdquo;</p>', '2020-03-26 12:24:57.000000', 4, 1, 40),
(34, 'Leeds United staff volunteer for wage deferral because of coronavirus outbreak', '<p>Leeds United&#39;s players, coaching staff and senior management have volunteered to take a wage deferral because of the impact of the coronavirus pandemic.</p>\r\n\r\n<p>Boss Marcelo Bielsa and his players will give up part of their wages &quot;for the forseeable future&quot;.</p>\r\n\r\n<p>The Championship leaders say the move will ensure that all 272 full-time non-football staff can continue to be paid.</p>\r\n\r\n<p>And the club expect the effects of the virus will cost them &quot;several million pounds&quot; each month.</p>\r\n\r\n<p>&quot;My players have demonstrated an incredible sense of unity and togetherness,&quot; said director of football Victor Orta.</p>\r\n\r\n<p>&quot;To Marcelo and his staff and all of the players, we thank them for putting our wider team first and taking care of family.&quot;</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.bbc.co.uk/sport/football/52041452\">PFA seeks &#39;urgent meeting&#39; with Premier League and EFL</a></li>\r\n</ul>\r\n\r\n<p>Championship leaders Leeds are seven points clear of third-placed Fulham as they look to return to the Premier League for the first time in 16 years.</p>\r\n\r\n<p>As well as the postponement of fixtures at Elland Road because of the Covid-19 pandemic, Leeds say they will lose money through the cancellation of events and the &quot;closure of the football financing market&quot;.</p>\r\n\r\n<p>The Yorkshire club are the latest to announce measures to lower wages, with Birmingham City asking players to&nbsp;<a href=\"https://www.bbc.co.uk/sport/football/52022741\">defer half of their salaries</a>&nbsp;for four months and League Two Forest Green Rovers saying they will use the government&#39;s wage-support scheme to keep paying &quot;all their staff&quot;.</p>\r\n\r\n<p>Leeds believe the money saved by the wages deferral will also mean &quot;the majority of casual staff&quot; can continue to be paid.</p>\r\n\r\n<p>&quot;We face uncertain times and therefore it is important that we all work together to find a way that the club can push through this period and end the season in the way we all hope we can,&quot; said the first-team squad in a joint statement.</p>', '2020-03-26 12:27:59.000000', 2, 1, 41),
(35, 'Movie Theaters Aren\'t Worried About Streaming in the Wake of Coronaviru', '<p>National Association of Theater Owners CCO Patrick Corcoran says movie theaters aren&#39;t worried about streaming competition in the aftermath of the&nbsp;<a href=\"https://screenrant.com/tag/coronavirus/\"><strong>coronavirus</strong></a>. The COVID-19 outbreak has had an unprecedented impact on the entertainment industry, to put it mildly. Over the last two weeks alone, everything from theaters to professional sports games, annual film festivals, and&nbsp;<a href=\"https://screenrant.com/coronavirus-events-conventions-expos-cancelled-delayed/\">comic book conventions have closed down</a>&nbsp;in order to prevent the further spread of the virus. In addition, the movie release calendar has been virtually wiped clean on through to the second half of May, with&nbsp;<a href=\"https://screenrant.com/in-heights-scooby-doo-scoob-malignant-movie-delayed/\">several films being indefinitely delayed</a>&nbsp;along the way.</p>\r\n\r\n<p>Because of this, the&nbsp;<a href=\"https://screenrant.com/us-movie-box-office-coronavirus-impact-revenue/\">U.S. box office recorded zero revenue</a>&nbsp;for the first time in history this past weekend and NATO has been working to secure funding from Congress to&nbsp;<a href=\"https://www.cbr.com/coronavirus-covid-19-amc-furloughs-employees-ceo/\" target=\"_blank\">help theaters and their employees get by financially</a>&nbsp;until they can reopen for business (however far away that might be). Meanwhile, studios have been&nbsp;<a href=\"https://screenrant.com/movies-ondemand-streaming-digital-release-dates-early-coronavirus/\">dropping their current releases on-demand</a>&nbsp;and on digital early for those self-quarantining to watch at home, leading many to wonder how this will impact the theater industry moving forward. However, according to Corcoran, streaming really isn&#39;t a concern for theater owners right now.</p>\r\n\r\n<p>&nbsp;</p>', '2020-03-26 12:29:43.000000', 6, 1, 42),
(36, 'This AMD Ryzen 9 3900X CPU and SSD bundle is on sale for $449.98', '<p>I don&#39;t typically highlight bundle deals, but will make an exception when it is particularly enticing. This is one of those moments. Over at Best Buy, you can score an AMD Ryzen 9 3900X processor and 500GB WD Black SN750 SSD (NVMe, no less) for&nbsp;<a href=\"https://bestbuy.7tiv.net/c/221109/614286/10014?subId1=pcg-1071157211150026200&amp;u=https%3A%2F%2Fwww.bestbuy.com%2Fsite%2Foffer%2F381894%2Fpcmcat1584558961195.c\" target=\"_blank\">$449.98 when bundled together</a>.</p>\r\n\r\n<p>The list price on the 3900X is $499.99, and the MSRP on the SSD is $139.99. Nobody actually pays those prices (or nobody&nbsp;<em>should</em>&nbsp;be, anyway), but this bundle offer still comes in well below street pricing. The cheapest price around for a 3900X is $418.70 (unless you&#39;re fortunate to live near a Micro Center), while finding a 500GB SN750 SSD in stock will set you back $86.95. So, you&#39;re saving $55.67 with this deal.</p>\r\n\r\n<p>In AMD territory, the 3900X is the&nbsp;<a href=\"https://www.pcgamer.com/best-cpu-for-gaming/\">best CPU for gaming</a>. It&#39;s based on AMD&#39;s latest generation Zen 2 CPU architecture and flexes 12 cores and 24 threads clocked at 3.8GHz to 4.6GHz. There is a lot of grunt underneath the hood, whether you are gaming, streaming, or knocking out a content creation chore.</p>\r\n\r\n<p>As to the SSD, the SN750 is one of the faster models on the market. In terms of raw specs, it offers up sequential read performance of up to 3,430MB/s and sequential write performance of up to 2,600MB/s. That&#39;s way above and beyond what you need for gaming, but at this price, you can splurge on fast hardware without feeling like you&#39;ve needlessly overspent.</p>', '2020-03-26 12:33:41.000000', 3, 1, 43),
(39, 'Patty Jenkins Left Thor 2 Because She Didn’t Want To Be Blamed For Its Failure', '<p>Director Patty Jenkins says she left&nbsp;<a href=\"https://screenrant.com/tag/thor-2/\"><strong><em>Thor: The Dark World</em></strong></a>&nbsp;because she didn&#39;t want to be blamed for the movie failing. As successful as the MCU&nbsp;has become, it&#39;s&nbsp;suffered its fair share of hiccups along the way. Over the years, the&nbsp;franchise has seen&nbsp;<a href=\"https://screenrant.com/marvel-mcu-directors-exits-problems-bad/\">multiple directors either drop out</a>&nbsp;because of creative differences or step away after finishing their movies&nbsp;and express&nbsp;their frustration with the artistic limitations imposed on them. Among the more infamous examples is&nbsp;<em>The Dark World</em>, which was&nbsp;<a href=\"https://screenrant.com/thor-2-dark-world-patty-jenkins-not-direct-exit-reason/\">originally going to be directed by Jenkins</a>&nbsp;before she stepped down and was replaced by Alan Taylor.</p>\r\n\r\n<p>In the years since&nbsp;<em>The Dark World</em>&nbsp;opened in 2013, Jenkins has talked about&nbsp;<a href=\"https://screenrant.com/marvel-thor-2-original-plan-patty-jenkins-exit/\">her original vision for the film</a>, describing it as a space opera with shades of&nbsp;<em>Romeo and Juliet</em>. She hasn&#39;t gone too deep into her reasons for leaving the film in the past, other than saying she &quot;wasn&#39;t the right director&quot; for it. However, in a more recent interview, Jenkins went more in-depth, admitting she was also concerned about what would happen to her career if&nbsp;<em>The Dark World</em>&nbsp;disappointed like she worried it would.</p>\r\n\r\n<p>&nbsp;</p>', '2020-03-27 17:14:03.000000', 6, 1, 60),
(40, 'NFL draft 2020 to go ahead as scheduled from 23-25 April', '<p>The 2020 NFL draft is to go ahead as scheduled next month but players, fans and media will not be present because of the coronavirus pandemic.</p>\r\n\r\n<p>It will be held from 23-25 April in a television studio, with players interviewed via video conference.</p>\r\n\r\n<p>The draft was due to take place in Las Vegas and the NFL had already cancelled all public events.</p>\r\n\r\n<p>NFL commissioner Roger Goodell said it &quot;can serve a very positive purpose for our clubs, our fans, and the country&quot;.</p>\r\n\r\n<p>He added: &quot;There is no assurance that we can select a different date and be confident that conditions will be significantly more favourable than they are today.&quot;</p>\r\n\r\n<p>The NFL draft is one of the biggest events in the United States&#39; sporting calendar, with all 32 teams recruiting talent from the American collegiate system amid wall-to-wall media coverage.</p>\r\n\r\n<p>About 500,000 fans attended last year&#39;s draft in Nashville.</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.bbc.co.uk/sport/american-football/52028323\">Panthers release quarterback Newton</a></li>\r\n	<li><a href=\"https://www.bbc.co.uk/sport/american-football/51968792\">Brady joins Buccaneers after Patriots exit</a></li>\r\n</ul>\r\n\r\n<p>In a memo sent to franchises, Goodell said: &quot;We will not be bringing prospects and their families to the draft, and the draft itself will be conducted and televised in a way that reflects current conditions.</p>\r\n\r\n<p>&quot;All clubs should now be doing the necessary planning to conduct draft operations in a location outside of your facility, with a limited number of people present, and with sufficient technology resources to allow you to communicate internally, with other clubs, and with draft headquarters.&quot;</p>', '2020-03-27 17:17:44.000000', 2, 1, 61);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` text COLLATE utf8_unicode_ci NOT NULL,
  `poruka` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `ime`, `naslov`, `poruka`, `datum`, `email`) VALUES
(1, 'TrueBleach', 'Nananana', 'dddddddddd', '2020-03-27 14:21:20', 'baneris95@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `idKategorije` int(10) NOT NULL,
  `naziv_kategorije` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`idKategorije`, `naziv_kategorije`) VALUES
(1, 'Political'),
(2, 'Sports'),
(3, 'Gaming'),
(4, 'Science'),
(5, 'Music'),
(6, 'Movie');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `idKomentara` int(11) NOT NULL,
  `idKomentarParent` int(11) NOT NULL,
  `tekst` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `vreme` datetime NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `idArtikla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`idKomentara`, `idKomentarParent`, `tekst`, `vreme`, `idKorisnik`, `idArtikla`) VALUES
(2, 0, '<p>Drugi komentar</p>', '2020-03-26 15:18:31', 1, 1),
(3, 0, '<p>Treci komentar</p>', '2020-03-26 15:18:38', 1, 1),
(5, 2, '<p>Drugi reply na drugom komentaru</p>', '2020-03-26 15:19:03', 1, 1),
(6, 3, '<p>Treci reply na trecem komentaru</p>', '2020-03-26 15:19:19', 1, 1),
(9, 0, '<p><strong>Komentar!!!</strong></p>', '2020-03-26 15:32:58', 10, 36),
(16, 15, '<p>Reply</p>', '2020-03-27 15:17:45', 1, 7),
(17, 0, '<p>Drugi komentar</p>', '2020-03-27 15:17:56', 1, 7),
(19, 0, '<p><s>Komentar</s></p>', '2020-03-27 15:51:43', 1, 36),
(21, 9, '<p>Repy</p>', '2020-03-27 16:22:55', 10, 36),
(22, 19, '<p>Re</p>', '2020-03-27 16:23:03', 10, 36),
(26, 0, '<p>Cetvrti komentar</p>\n\n<p>&nbsp;</p>', '2020-03-27 17:08:56', 1, 1),
(27, 26, '<p>Peti kom</p>', '2020-03-27 17:09:01', 1, 1),
(28, 0, '<p>Peti kom</p>', '2020-03-27 17:09:14', 1, 1),
(29, 0, '<p>Sesti kom</p>', '2020-03-27 17:09:26', 1, 1),
(30, 0, '<p>Sedmi</p>', '2020-03-27 17:09:30', 1, 1),
(33, 0, '<p><code>Ful!</code></p>', '2020-03-27 17:18:37', 1, 40),
(34, 0, '<blockquote>\n<p>Fulara</p>\n</blockquote>', '2020-03-27 17:18:50', 1, 40),
(35, 0, '<h1>Fulcina</h1>', '2020-03-27 17:19:01', 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idKorisnik` int(10) NOT NULL,
  `ime_korisnika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prezime_korisnika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `aktivan` int(11) NOT NULL,
  `uloge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idKorisnik`, `ime_korisnika`, `prezime_korisnika`, `email`, `lozinka`, `created_on`, `aktivan`, `uloge_id`) VALUES
(1, 'Bane', 'Ristivojevic', 'baneris98@gmail.com', '8dd1892a16f70d19e3c56fa42f2193f5', '0000-00-00 00:00:00', 1, 1),
(2, 'Korisnik', 'Korisnik', 'korisnik@gmail.com', 'bce0fe6b32f31982124e9bf38bf6ecf6', '2020-03-06 11:02:15', 0, 2),
(3, 'Nemanja', 'Nemanja', 'nemanja@gmail.com', '8dd1892a16f70d19e3c56fa42f2193f5', '2020-03-09 15:27:20', 0, 2),
(4, 'Milica', 'Milica', 'milica33@gmail.com', '8dd1892a16f70d19e3c56fa42f2193f5', '2020-03-09 15:37:08', 0, 2),
(5, 'Jovana', 'Jovana', 'jovana@gmail.com', 'd8095e8d0ba7a74d983eb3ad50c9f273', '2020-03-09 15:38:23', 0, 2),
(6, 'Jovana', 'Jovana', 'jovana22@gmail.com', '8dd1892a16f70d19e3c56fa42f2193f5', '2020-03-09 15:39:33', 0, 2),
(7, 'Jovana', 'Jovana', 'jovana222@gmail.com', '8508a4d5a5dc19d4efc53328a131ab37', '2020-03-09 15:41:55', 0, 2),
(9, 'Nikola', 'Nikolic', 'nikola@gmail.com', '3ff56d13ea6761e6701b155b12918616', '2020-03-09 11:28:25', 0, 1),
(10, 'Janja', 'Ristivojevic', 'janja@gmail.com', '8dd1892a16f70d19e3c56fa42f2193f5', '2020-03-16 17:39:21', 0, 2),
(11, 'Marko', 'Mark', 'marko@gmail.com', '8dd1892a16f70d19e3c56fa42f2193f5', '2020-03-16 17:51:21', 0, 2),
(13, 'Nikola', 'Dzoni', 'dzoni@gmail.com', 'a6723b06e440f879055c66e30729c8d2', '2020-03-16 17:54:59', 0, 2),
(17, 'Ivana', 'Marinkovic', 'ivana@gmail.com', '8108f555f5849c4073f17cd2e09c39ee', '0000-00-00 00:00:00', 0, 2),
(18, 'Filip', 'Matejic', 'filip@gmail.com', 'fa486e33cdb870ecb0d5b09f243405e8', '0000-00-00 00:00:00', 0, 2),
(19, 'Mladen', 'Paunovic', 'mladen@gmail.com', 'e256f474754b1dd19d81b4e46770996c', '0000-00-00 00:00:00', 0, 2),
(20, 'Natasaaa', 'Andric', 'natasa@gmail.com', '91e17d7c78e5214b68d43ea6b02d331a', '0000-00-00 00:00:00', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(11) NOT NULL,
  `imeMenija` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rutaMenija` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `imeMenija`, `rutaMenija`) VALUES
(1, 'Home', '/'),
(2, 'Contact', '/contact'),
(4, 'Admin', '/admin'),
(5, 'Login', '/login'),
(6, 'Register', '/register');

-- --------------------------------------------------------

--
-- Table structure for table `posete`
--

CREATE TABLE `posete` (
  `id` int(11) NOT NULL,
  `datum_posete` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idArtikla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posete`
--

INSERT INTO `posete` (`id`, `datum_posete`, `ip`, `idArtikla`) VALUES
(1, '2020-03-26 22:41:18', '1270', 36),
(2, '2020-03-26 22:42:28', '127.0.0.1', 35),
(3, '2020-03-26 23:12:13', '127.0.0.1', 36),
(4, '2020-03-26 23:12:18', '127.0.0.1', 36),
(5, '2020-03-26 23:17:09', '127.0.0.1', 36),
(6, '2020-03-26 23:17:22', '127.0.0.1', 36),
(7, '2020-03-26 23:19:10', '127.0.0.1', 36),
(8, '2020-03-26 23:19:32', '127.0.0.1', 36),
(9, '2020-03-26 23:19:50', '127.0.0.1', 36),
(10, '2020-03-26 23:20:59', '127.0.0.1', 36),
(11, '2020-03-26 23:21:13', '127.0.0.1', 36),
(12, '2020-03-27 00:42:25', '127.0.0.1', 35),
(13, '2020-03-27 13:58:32', '127.0.0.1', 36),
(14, '2020-03-27 14:01:21', '127.0.0.1', 36),
(16, '2020-03-27 14:01:25', '127.0.0.1', 36),
(17, '2020-03-27 14:01:27', '127.0.0.1', 7),
(18, '2020-03-27 14:01:30', '127.0.0.1', 1),
(20, '2020-03-27 14:01:31', '127.0.0.1', 36),
(21, '2020-03-27 15:17:25', '127.0.0.1', 7),
(22, '2020-03-27 15:51:32', '127.0.0.1', 36),
(23, '2020-03-27 15:55:19', '127.0.0.1', 36),
(24, '2020-03-27 15:58:49', '127.0.0.1', 36),
(25, '2020-03-27 16:00:08', '127.0.0.1', 36),
(26, '2020-03-27 16:00:48', '127.0.0.1', 36),
(27, '2020-03-27 16:01:12', '127.0.0.1', 36),
(28, '2020-03-27 16:13:34', '127.0.0.1', 36),
(29, '2020-03-27 16:13:39', '127.0.0.1', 36),
(30, '2020-03-27 16:14:04', '127.0.0.1', 36),
(31, '2020-03-27 16:14:44', '127.0.0.1', 36),
(32, '2020-03-27 16:16:43', '127.0.0.1', 36),
(33, '2020-03-27 16:22:47', '127.0.0.1', 36),
(34, '2020-03-27 16:53:25', '127.0.0.1', 36),
(35, '2020-03-27 16:55:25', '127.0.0.1', 36),
(37, '2020-03-27 16:55:29', '127.0.0.1', 36),
(39, '2020-03-27 16:55:46', '127.0.0.1', 36),
(40, '2020-03-27 17:01:18', '127.0.0.1', 36),
(41, '2020-03-27 17:04:57', '127.0.0.1', 1),
(42, '2020-03-27 17:08:32', '127.0.0.1', 36),
(43, '2020-03-27 17:08:41', '127.0.0.1', 1),
(44, '2020-03-27 17:09:18', '127.0.0.1', 1),
(45, '2020-03-27 17:18:19', '127.0.0.1', 40),
(46, '2020-03-27 17:39:44', '127.0.0.1', 36),
(47, '2020-03-27 17:39:51', '127.0.0.1', 1),
(48, '2020-03-27 17:39:57', '127.0.0.1', 7),
(49, '2020-03-27 18:06:40', '127.0.0.1', 36);

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `idSlike` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `putanja_slike` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`idSlike`, `created_at`, `updated_at`, `putanja_slike`) VALUES
(1, '2020-03-22 00:00:00', '0000-00-00 00:00:00', 'img/gallery/melania.jpg'),
(2, '2020-03-22 00:00:00', '0000-00-00 00:00:00', 'img/gallery/health.jpg'),
(3, '2020-03-22 00:00:00', '0000-00-00 00:00:00', 'img/gallery/messi.jpg'),
(4, '2020-03-22 00:00:00', '0000-00-00 00:00:00', 'img/gallery/b.jpg\r\n'),
(5, '2020-03-22 00:00:00', '0000-00-00 00:00:00', 'img/gallery/nucleus.jpg'),
(6, '2020-03-22 00:00:00', '0000-00-00 00:00:00', 'img/gallery/trump.jpg'),
(7, '2020-03-22 00:00:00', '0000-00-00 00:00:00', 'img/gallery/biden.jpg'),
(8, '2020-03-22 00:00:00', '0000-00-00 00:00:00', 'img/gallery/s.jpg\r\n'),
(31, '2020-03-23 21:18:42', '2020-03-23 21:18:42', 'img/gallery/half.jpg'),
(32, '2020-03-24 14:45:55', '2020-03-24 14:45:55', 'img/gallery/pearl.jpg'),
(36, '2020-03-25 00:00:00', '0000-00-00 00:00:00', 'img/gallery/half.jpg'),
(37, '2020-03-26 12:06:46', '2020-03-26 12:06:46', 'img/gallery/pearl.jpg'),
(38, '2020-03-26 12:18:34', '2020-03-26 12:18:34', 'img/gallery/dua.jpg'),
(39, '2020-03-26 12:22:59', '2020-03-26 12:22:59', 'img/gallery/joker.jpg'),
(40, '2020-03-26 12:24:57', '2020-03-26 12:24:57', 'img/gallery/squid.jpg'),
(41, '2020-03-26 12:27:59', '2020-03-26 12:27:59', 'img/gallery/leeds.jpg'),
(42, '2020-03-26 12:29:43', '2020-03-26 12:29:43', 'img/gallery/netflix.jpg'),
(43, '2020-03-26 12:33:41', '2020-03-26 12:33:41', 'img/gallery/ssd.jpg'),
(44, '2020-03-27 00:21:04', '2020-03-27 00:21:04', 'img/gallery/r8.jpg'),
(45, '2020-03-27 00:22:16', '2020-03-27 00:22:16', 'img/gallery/r8.jpg'),
(46, '2020-03-27 00:26:46', '2020-03-27 00:26:46', 'img/gallery/r8.jpg'),
(47, '2020-03-27 00:28:10', '2020-03-27 00:28:10', 'img/gallery/1585268890_b.jpg'),
(48, '2020-03-27 00:29:08', '2020-03-27 00:29:08', 'img/gallery/1585268948_melania.jpg'),
(49, '2020-03-27 00:31:37', '2020-03-27 00:31:37', 'img/gallery/r7.jpg'),
(50, '2020-03-27 00:37:26', '2020-03-27 00:37:26', 'img/gallery/1585269446_melania.jpg'),
(51, '2020-03-27 00:40:52', '2020-03-27 00:40:52', 'img/gallery/1585269652_melania.jpg'),
(52, '2020-03-27 00:41:07', '2020-03-27 00:41:07', 'img/gallery/1585269667_b.jpg'),
(53, '2020-03-27 00:41:38', '2020-03-27 00:41:38', 'img/gallery/1585269698_biden.jpg'),
(54, '2020-03-27 00:42:06', '2020-03-27 00:42:06', 'img/gallery/1585269726_s.jpg'),
(55, '2020-03-27 12:13:03', '2020-03-27 12:13:03', 'img/gallery/1585311183_r8.jpg'),
(56, '2020-03-27 12:13:15', '2020-03-27 12:13:15', 'img/gallery/1585311195_melania.jpg'),
(57, '2020-03-27 16:59:24', '2020-03-27 16:59:24', 'img/gallery/1585328364_1585311183_r8.jpg'),
(58, '2020-03-27 16:59:45', '2020-03-27 16:59:45', 'img/gallery/1585328385_melania.jpg'),
(59, '2020-03-27 17:00:02', '2020-03-27 17:00:02', 'img/gallery/1585328364_1585311183_r8.jpg'),
(60, '2020-03-27 17:14:03', '2020-03-27 17:14:03', 'img/gallery/thor.webp'),
(61, '2020-03-27 17:17:44', '2020-03-27 17:17:44', 'img/gallery/nhl.jpg'),
(62, '2020-03-27 18:04:16', '2020-03-27 18:04:16', 'img/gallery/1585332256_1585311183_r8.jpg'),
(63, '2020-03-27 18:04:35', '2020-03-27 18:04:35', 'img/gallery/1585332275_1585328385_melania.jpg'),
(64, '2020-03-27 18:04:50', '2020-03-27 18:04:50', 'img/gallery/1585269652_melania.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `idUloge` int(10) NOT NULL,
  `naziv_uloge` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`idUloge`, `naziv_uloge`) VALUES
(1, 'Admin'),
(2, 'Korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmeni`
--
ALTER TABLE `adminmeni`
  ADD PRIMARY KEY (`idAdminMeni`);

--
-- Indexes for table `akcije`
--
ALTER TABLE `akcije`
  ADD PRIMARY KEY (`idAkcije`);

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`idArtikla`),
  ADD KEY `idKategorije` (`idKategorije`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idSlike` (`idSlike`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idKategorije`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`idKomentara`),
  ADD KEY `idKorisnik` (`idKorisnik`),
  ADD KEY `idArtikla` (`idArtikla`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uloge_id` (`uloge_id`),
  ADD KEY `uloge_id_2` (`uloge_id`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `posete`
--
ALTER TABLE `posete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idArtikla` (`idArtikla`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`idSlike`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`idUloge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmeni`
--
ALTER TABLE `adminmeni`
  MODIFY `idAdminMeni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `akcije`
--
ALTER TABLE `akcije`
  MODIFY `idAkcije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `idArtikla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `idKategorije` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `idKomentara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idKorisnik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posete`
--
ALTER TABLE `posete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `idSlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `idUloge` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikli`
--
ALTER TABLE `artikli`
  ADD CONSTRAINT `artikli_ibfk_1` FOREIGN KEY (`idKategorije`) REFERENCES `kategorije` (`idKategorije`) ON DELETE CASCADE,
  ADD CONSTRAINT `artikli_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `korisnici` (`idKorisnik`) ON DELETE CASCADE,
  ADD CONSTRAINT `artikli_ibfk_3` FOREIGN KEY (`idSlike`) REFERENCES `slike` (`idSlike`) ON DELETE CASCADE;

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnici` (`idKorisnik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentari_ibfk_2` FOREIGN KEY (`idArtikla`) REFERENCES `artikli` (`idArtikla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`uloge_id`) REFERENCES `uloge` (`idUloge`) ON DELETE CASCADE;

--
-- Constraints for table `posete`
--
ALTER TABLE `posete`
  ADD CONSTRAINT `posete_ibfk_1` FOREIGN KEY (`idArtikla`) REFERENCES `artikli` (`idArtikla`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
