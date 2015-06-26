--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `activity` enum('moderation','submission') NOT NULL DEFAULT 'moderation',
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
`id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `last_login_time`, `date_created`, `date_modified`) VALUES
(1, 'Zainul Abdeen', 'zainul@comedyhunt.com', '6d808ecfd24037ca31db96e3cb1d1e1e', NULL, '2015-06-20 10:27:27', '2015-06-20 15:01:05'),
(2, 'Arief', 'arief@comedyhunt.com', '079fcac7902d9fb41b269ada64a932a0', NULL, '2015-06-20 10:27:27', '2015-06-20 15:01:12'),
(3, 'Sherin Jacob', 'sherin@comedyhunt.com', '937f2fb111d320e228d45e05cc560ac4', NULL, '2015-06-20 10:27:27', '2015-06-20 15:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
`id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
`id` int(11) NOT NULL,
  `user_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `source` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `media_id` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` enum('video','image','text','ppt','pdf','doc','blog') CHARACTER SET utf8 NOT NULL DEFAULT 'video',
  `author` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `channel_name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `authentication` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `notes` text CHARACTER SET utf8,
  `flags` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `is_ugc` tinyint(1) NOT NULL DEFAULT '0',
  `thumb_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `alternate_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` enum('pending','active','inactive','deleted','rejected','approved','under_review','processing','error') CHARACTER SET utf8 NOT NULL DEFAULT 'pending',
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_views`
--

CREATE TABLE `content_views` (
  `content_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `views` int(11) unsigned NOT NULL DEFAULT '0',
  `environment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `gallery_fast` (`id`);

--
-- Indexes for table `content_views`
--
ALTER TABLE `content_views`
 ADD KEY `content_id` (`content_id`), ADD KEY `environment_id` (`environment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;