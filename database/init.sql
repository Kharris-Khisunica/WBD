DROP TABLE IF EXISTS users, company_detail, jobseeker_detail, lowongan, attachment_lowongan, lamaran;
DROP TYPE IF EXISTS user_role, jenis_pekerjaan_type, jenis_lokasi_type, kategori_pekerjaan_type, status_type;
CREATE TYPE user_role AS ENUM ('jobseeker', 'company');
CREATE TYPE jenis_pekerjaan_type AS ENUM ('fulltime', 'parttime', 'internship');
CREATE TYPE jenis_lokasi_type AS ENUM ('onsite', 'remote', 'hybrid');
CREATE TYPE kategori_pekerjaan_type AS ENUM ('accounting and finance', 'business, consulting, and management', 'creative arts',  'engineering and manufacturing', 'law enforcement', 'marketing', 'law', 'information technology', 'retail', 'healthcare', 'pharmaceutical', 'administration', 'teaching');
CREATE TYPE status_type AS ENUM ('accepted', 'rejected', 'waiting'); 

CREATE TABLE users (
    user_id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
    email VARCHAR(120),
    password VARCHAR(120),
    role user_role,
    nama VARCHAR(50)
);

CREATE TABLE company_detail (
    user_id bigint PRIMARY KEY,
    lokasi VARCHAR(120),
    about VARCHAR(1000),
    bidang VARCHAR(50),
    pp_path VARCHAR(120),
    FOREIGN KEY(user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);

CREATE TABLE jobseeker_detail (
    user_id bigint PRIMARY KEY,
    skill VARCHAR(500),
    edukasi VARCHAR(500),
    about VARCHAR(1000),
    experience VARCHAR(1000),
    pp_path VARCHAR(120),
    FOREIGN KEY(user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);

CREATE TABLE lowongan (
    lowongan_id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
    company_id bigint,
    posisi varchar(50),
    deskripsi varchar(1000),
    jenis_pekerjaan jenis_pekerjaan_type,
    jenis_lokasi jenis_lokasi_type,
    kategori_pekerjaan kategori_pekerjaan_type,
    is_open boolean DEFAULT true,
    created_at timestamp,
    updated_at timestamp,
    FOREIGN KEY(company_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
);

CREATE TABLE attachment_lowongan (
    attachment_id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
    lowongan_id bigint,
    file_path VARCHAR(120),
    FOREIGN KEY(lowongan_id)
        REFERENCES lowongan(lowongan_id)
        ON DELETE CASCADE
);

CREATE TABLE lamaran (
    lamaran_id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
    user_id bigint,
    lowongan_id bigint,
    cv_path VARCHAR(120),
    video_path VARCHAR(120),
    stat status_type DEFAULT 'waiting',
    stat_reason VARCHAR(500),
    created_at TIMESTAMP,
    FOREIGN KEY(user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE,
    FOREIGN KEY(lowongan_id)
        REFERENCES lowongan(lowongan_id)
        ON DELETE CASCADE
);

-- Inserting data --
--
-- Data for: users
--
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (1, 'gonzalezkristy@example.net', 'structure', 'jobseeker', 'Meagan Stanley');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (2, 'fordtravis@example.com', 'direction', 'jobseeker', 'Heather Ferguson');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (3, 'megan42@example.org', 'tell', 'jobseeker', 'Jessica Valdez');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (4, 'adambaker@example.net', 'note', 'jobseeker', 'Brian Sanchez PhD');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (5, 'jacqueline75@smith.info', 'north', 'company', 'Morrow, Wagner and Baker');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (6, 'colejacob@kelly.org', 'toward', 'company', 'Mendoza-Mcgee');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (7, 'harrisbrandy@example.com', 'more', 'jobseeker', 'Michael Robinson');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (8, 'bruiz@andrews.info', 'available', 'company', 'Greene-Fields');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (9, 'carterchad@leblanc-martinez.net', 'account', 'company', 'Middleton Ltd');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (10, 'garciaandrew@example.com', 'allow', 'jobseeker', 'John Stephens');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (11, 'mcgeejean@dyer.com', 'population', 'company', 'Taylor-Davidson');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (12, 'nsmith@example.com', 'simply', 'jobseeker', 'Paul Brown');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (13, 'erica09@thompson.com', 'clear', 'company', 'Duncan Inc');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (14, 'shanethompson@example.org', 'plan', 'jobseeker', 'Randall Farmer');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (15, 'johnmiller@example.com', 'day', 'jobseeker', 'James Figueroa');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (16, 'smercer@bridges-lowery.org', 'fish', 'company', 'Page Group');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (17, 'lparker@example.org', 'where', 'jobseeker', 'Thomas Burnett');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (18, 'hamiltongary@kelley.com', 'data', 'company', 'Barnes, Fischer and Patel');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (19, 'montgomerypaul@example.net', 'pull', 'jobseeker', 'Andrew Phillips');
INSERT INTO public.users OVERRIDING SYSTEM VALUE VALUES (20, 'johnsexton@brown.com', 'lay', 'company', 'Hurst-Green');
--
-- Data for: company_detail
--
INSERT INTO public.company_detail VALUES (5, '33125 Blake Corner Apt. 924
Lake Brittanychester, MO 07695', 'With stock seven research argue yet. Keep if painting tonight station staff with town. Building sit certainly gun force training lead first.', 'administration', '/writer/impact/treat/through.jpg');
INSERT INTO public.company_detail VALUES (6, '1898 Haas Pike
Thomastown, CT 03515', 'Set detail dark finally pressure. Fear according east once indeed campaign end ground. Scientist street doctor others base white.', 'information technology', '/number/focus/water/action.jpg');
INSERT INTO public.company_detail VALUES (8, '93519 Boyer Village Apt. 937
Paulabury, NJ 05754', 'Detail manager issue decade else. Major late body field theory. Forget power technology its.', 'law', '/ever/national/stuff/significant.jpg');
INSERT INTO public.company_detail VALUES (9, '530 Michele Dam Apt. 287
South Melissaland, DE 10311', 'Now over choice star.', 'administration', '/thought/region/this/along.jpg');
INSERT INTO public.company_detail VALUES (11, '0826 Peter Oval
Larryfort, MH 25509', 'Market but while boy pay parent forward.', 'healthcare', '/over/month/plant/total.jpg');
INSERT INTO public.company_detail VALUES (13, '71746 Steven Plaza Suite 048
Sarahberg, WV 10730', 'Fall thought thank thus crime around age. Letter arm ever. Race I matter window.', 'administration', '/treat/various/century/piece.jpg');
INSERT INTO public.company_detail VALUES (16, '5857 Nunez Junctions Apt. 965
Bruceville, WV 10436', 'Thing writer finally push increase early. Improve soon seek reality. Building most particularly daughter man benefit manager indeed.', 'law', '/prove/beat/get/tough.jpg');
INSERT INTO public.company_detail VALUES (18, '028 Vasquez Pike Apt. 721
North Patrick, NH 67041', 'You allow child cost brother affect life. Style gun ask behind matter.', 'healthcare', '/ever/get/age/same.jpg');
INSERT INTO public.company_detail VALUES (20, '706 Phillips Rue
Port Christineview, PW 24149', 'Low sometimes avoid church. Purpose station close benefit room. During member top them.', 'engineering and manufacturing', '/community/either/street/as.jpg');
--
-- Data for: jobseeker_detail
--
INSERT INTO public.jobseeker_detail VALUES (1, 'Virtual upward-trending Graphic Interface', 'City what then report need dark.', 'Music shoulder project case can animal card. Area once good stage check move. Cell heart address wall onto.', 'Maintenance engineer at Delgado-Grimes for 12 years.', '/memory/thousand/table/I.jpg');
INSERT INTO public.jobseeker_detail VALUES (2, 'Streamlined 6thgeneration Internet solution', 'Seem race edge. This very industry education official friend.', 'Coach eye floor realize.', 'Best boy at Kennedy and Sons for 13 years.', '/song/south/lawyer/stay.jpg');
INSERT INTO public.jobseeker_detail VALUES (3, 'Down-sized high-level policy', 'Plant factor design energy police begin name discuss. Cause difficult miss act pattern window.', 'System too loss decade foot bank specific. Appear simple provide sister girl. Bank character we wide word.', 'Catering manager at Fields-Wall for 10 years.', '/open/modern/movie/former.jpg');
INSERT INTO public.jobseeker_detail VALUES (4, 'Cloned bottom-line alliance', 'Door discuss field more another region site line. Bank find live prevent magazine health far.', 'Receive give rich have environmental report. Create toward husband should social floor staff house. Data guy business environment magazine actually truth appear.', 'Neurosurgeon at Robinson, Ramos and Ross for 9 years.', '/east/cost/for/nearly.jpg');
INSERT INTO public.jobseeker_detail VALUES (7, 'Reduced value-added Graphic Interface', 'Entire stand common suggest word garden everyone. Will politics commercial son machine impact.', 'Never bag run social apply true again. Who environment age crime quickly.', 'Contractor at Hall-Baxter for 13 years.', '/south/player/federal/just.jpg');
INSERT INTO public.jobseeker_detail VALUES (10, 'Ameliorated 5thgeneration model', 'Case huge modern change situation plant range economic. Year our event. Religious movement direction just improve serve.', 'Student treatment western role guy final. Cut kitchen name road result hot.', 'Press sub at Brown, Jones and Marquez for 6 years.', '/set/too/miss/young.jpg');
INSERT INTO public.jobseeker_detail VALUES (12, 'Optional grid-enabled synergy', 'Enough stuff political million attack wife able them. Significant language guess open. Stand others decide serve quality without game. Hundred marriage theory beat win relationship.', 'Benefit about job sing land southern. Top than late tell thing reflect.', 'Surveyor, insurance at Wolfe, White and Hughes for 15 years.', '/go/gun/whole/vote.jpg');
INSERT INTO public.jobseeker_detail VALUES (14, 'Reactive 5thgeneration focus group', 'Experience visit race we event away model. Establish court design peace. Whatever public church firm.', 'Hour modern three present. Reach letter decide large what compare long.', 'Bookseller at Russell-Frost for 10 years.', '/choose/condition/sit/idea.jpg');
INSERT INTO public.jobseeker_detail VALUES (15, 'Horizontal secondary application', 'Girl hold appear. Position fish maintain go American. Gas member certain author occur painting science. Player Congress decide decide important.', 'Require skill appear. Which its well return. Right raise mention effect on. Nearly each commercial career career wait.', 'Clothing/textile technologist at Colon Inc for 2 years.', '/parent/low/newspaper/way.jpg');
INSERT INTO public.jobseeker_detail VALUES (17, 'Mandatory asymmetric structure', 'Ago over wife floor could else color.', 'View training appear their scientist environmental. Decade box clearly structure process.', 'Haematologist at King-Davis for 5 years.', '/born/yes/any/personal.jpg');
INSERT INTO public.jobseeker_detail VALUES (19, 'Polarized needs-based challenge', 'Protect picture article common property. Try study poor sure company sport.', 'Song thousand sea better hotel training especially. Drive consumer girl agency conference language century. Wait garden magazine many model.', 'Writer at Wilson, Barrett and Monroe for 15 years.', '/happy/drive/land/protect.jpg');
--
-- Data for: lowongan
--
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (1, 5, 'Artist', 'Have former wife speech. Mother quality sea quality.', 'parttime', 'remote', 'retail', false, '1977-01-22 12:21:58', '1970-07-26 06:32:25');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (2, 6, 'Trading standards officer', 'Onto role study anyone same ready. Rate record also somebody.', 'internship', 'remote', 'information technology', true, '2019-03-13 09:52:19', '1970-10-09 23:52:12');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (3, 8, 'Mining engineer', 'Son bill candidate until. Knowledge character truth able give simply line.', 'internship', 'hybrid', 'business, consulting, and management', true, '2023-09-13 16:59:23', '1992-03-17 05:13:59');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (4, 9, 'Community arts worker', 'Accept east your. Hand still record imagine those family her. Nothing set such son question today seem.', 'parttime', 'hybrid', 'marketing', false, '2022-11-27 18:27:11', '1994-11-11 04:36:09');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (5, 11, 'Health visitor', 'Protect question family use evening mission religious. Industry language drug like agreement leader yes.', 'fulltime', 'hybrid', 'law enforcement', false, '2019-01-09 11:04:39', '1980-11-15 16:35:08');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (6, 13, 'Armed forces logistics/support/administrative offi', 'Safe look set population. Interest law half for significant place.', 'parttime', 'hybrid', 'engineering and manufacturing', true, '1988-04-03 19:14:22', '2014-03-20 08:04:57');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (7, 16, 'Nurse, learning disability', 'Able during agreement key. Hear allow plant certain machine affect.', 'parttime', 'onsite', 'administration', false, '2014-06-23 05:33:27', '1978-05-20 15:46:09');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (8, 18, 'Paramedic', 'Particularly short candidate today. Force often up tonight the ago.', 'parttime', 'onsite', 'information technology', false, '1979-06-06 00:36:11', '1978-03-20 18:21:46');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (9, 20, 'Fisheries officer', 'War focus short hear quality successful. Tough none clear consumer.', 'fulltime', 'hybrid', 'marketing', true, '2009-10-11 10:57:42', '1978-10-20 00:08:20');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (10, 5, 'Curator', 'Few she indicate yourself candidate. Site painting and resource pay somebody remain.', 'parttime', 'remote', 'administration', true, '1976-03-07 14:45:18', '1971-05-01 09:45:36');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (11, 6, 'Toxicologist', 'Result similar hand set case say machine.', 'fulltime', 'hybrid', 'retail', false, '1976-06-17 07:31:49', '2005-04-06 20:44:50');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (12, 8, 'Hotel manager', 'Little send necessary very firm show. Major must town threat. Information list pay ever though for ability.', 'parttime', 'onsite', 'pharmaceutical', false, '1986-09-19 14:17:47', '1998-08-14 02:17:45');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (13, 9, 'Proofreader', 'Majority can only floor argue. Catch huge film production attorney.', 'fulltime', 'remote', 'marketing', true, '1975-06-25 13:59:46', '1975-08-28 07:12:05');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (14, 11, 'Radio broadcast assistant', 'Think him story hope because. Fact do win inside gas. Choice class represent remain always size. Order book clear go city interesting.', 'internship', 'onsite', 'marketing', true, '1987-10-10 14:44:25', '2022-09-15 14:02:13');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (15, 13, 'Secondary school teacher', 'Least page her. Very us fly surface.', 'internship', 'remote', 'engineering and manufacturing', false, '1988-10-21 01:07:23', '1980-10-11 10:08:34');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (16, 16, 'Geneticist, molecular', 'Staff why traditional seat over. Offer identify development entire single reason. Everybody indicate technology student may analysis raise.', 'parttime', 'hybrid', 'creative arts', true, '2002-11-16 05:32:04', '2023-06-22 23:18:07');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (17, 18, 'Games developer', 'Degree student least answer at campaign above. Produce eat enter office out good include watch. Main it and tree figure.', 'parttime', 'hybrid', 'law', true, '1989-02-09 09:42:07', '1995-04-14 14:51:02');
INSERT INTO public.lowongan OVERRIDING SYSTEM VALUE VALUES (18, 20, 'Copy', 'Process school design writer. Final front create.', 'parttime', 'onsite', 'engineering and manufacturing', false, '2015-12-10 16:31:51', '2003-03-28 22:35:56');
--
-- Data for: attachment_lowongan
--
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (1, 1, '/team/finally/cost/among.jpg');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (2, 2, '/own/class/involve/cell.png');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (3, 3, '/itself/year/employee/walk.jpg');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (4, 4, '/population/stay/various/probably.jpg');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (5, 5, '/food/right/nature/somebody.pdf');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (6, 6, '/tonight/story/toward/night.png');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (7, 7, '/doctor/significant/crime/quickly.jpg');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (8, 8, '/soon/lose/toward/true.mp4');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (9, 9, '/over/argue/nature/employee.mp4');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (10, 10, '/military/structure/audience/me.pdf');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (11, 11, '/run/key/range/skill.mp4');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (12, 12, '/common/find/itself/however.mp4');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (13, 13, '/although/young/how/despite.mp4');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (14, 14, '/do/enough/return/political.png');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (15, 15, '/drive/little/theory/subject.mp4');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (16, 16, '/recent/law/indicate/southern.pdf');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (17, 17, '/cold/reach/short/yard.png');
INSERT INTO public.attachment_lowongan OVERRIDING SYSTEM VALUE VALUES (18, 18, '/career/write/town/investment.png');
--
-- Data for: lamaran
--
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (1, 1, 17, '/thank/fall/feeling/represent.pdf', '/there/most/simply/quickly.mp4', 'accepted', 'Also soon left side. Reason Congress idea professor around fill camera. Institution production bring lawyer success quality. Practice project identify south.', '1980-11-15 10:03:38');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (2, 2, 7, '/today/own/hotel/particularly.pdf', '/hard/recognize/throw/step.mp4', 'accepted', 'Treat identify off city trade anything. Republican her through moment worry might school. Several tonight civil truth.', '2017-10-10 03:10:06');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (3, 3, 16, '/in/truth/herself/line.pdf', '/relationship/avoid/discussion/six.mp4', 'accepted', 'Occur upon bag American politics through. American store short magazine with. Relationship PM unit ask general environmental.', '1987-05-20 04:19:09');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (4, 4, 17, '/small/someone/reach/measure.pdf', '/religious/bill/team/vote.mp4', 'rejected', 'Me institution effect movie college people character. First nature ago chance couple may deal. Property play now different word contain you apply.', '2011-05-29 10:26:53');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (5, 7, 15, '/already/team/determine/everything.pdf', '/movie/partner/most/class.mp4', 'rejected', 'Best manager break good laugh. Pick act against another spring.', '1988-07-31 09:52:47');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (6, 10, 4, '/fast/Mrs/them/choice.pdf', '/fact/camera/office/herself.mp4', 'accepted', 'Tree much without bag tough care religious life. Opportunity involve course newspaper per so.', '1973-01-10 10:04:48');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (7, 12, 3, '/ready/lead/produce/recognize.pdf', '/wide/meeting/food/environmental.mp4', 'accepted', 'Exactly control candidate rather feeling. Ball item left. Good away yeah cultural.', '2021-01-14 19:53:43');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (8, 14, 4, '/job/memory/others/chair.pdf', '/Democrat/pull/before/say.mp4', 'rejected', 'Successful term toward save bad participant member. Media environment within economy. Material front policy threat box order grow.', '1970-01-03 03:46:16');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (9, 15, 13, '/turn/almost/personal/federal.pdf', '/nor/first/way/material.mp4', 'accepted', 'Too exactly short choice person increase black. Or stop explain group building measure late. Whatever though show small call.', '2017-11-28 06:10:40');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (10, 17, 1, '/we/upon/American/real.pdf', '/day/term/security/investment.mp4', 'rejected', 'Church talk live national social. Material let morning already claim. Often green trial.', '1976-09-09 00:23:01');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (11, 19, 7, '/share/carry/set/artist.pdf', '/situation/far/nor/price.mp4', 'accepted', 'Group boy television. Heart business different stage agent.', '2016-10-13 10:45:42');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (12, 1, 1, '/decade/lay/recently/model.pdf', '/little/than/focus/summer.mp4', 'rejected', 'Mr condition lead might figure science. Believe nice man but itself approach. Hit next mouth might owner kid.', '1977-06-20 23:13:32');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (13, 2, 10, '/of/another/young/medical.pdf', '/kind/chance/art/industry.mp4', 'accepted', 'Television half range many cell trial two. Soon watch born.', '1987-04-02 03:39:54');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (14, 3, 6, '/until/everything/building/take.pdf', '/keep/soldier/hospital/coach.mp4', 'accepted', 'Star leave new pretty catch.', '2022-06-29 21:13:07');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (15, 4, 2, '/stage/red/may/his.pdf', '/recent/style/together/analysis.mp4', 'rejected', 'Back treat eye loss foot high whether. History religious they reflect challenge source weight. Something perhaps song oil.', '2005-07-04 20:46:14');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (16, 7, 13, '/serve/degree/reach/throughout.pdf', '/never/plan/company/market.mp4', 'rejected', 'Science certain ball. Never west anyone sort.', '1971-03-29 04:40:29');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (17, 10, 2, '/trip/tree/with/girl.pdf', '/ahead/religious/leader/recognize.mp4', 'rejected', 'Election pretty himself offer add view. Social impact these.', '2003-05-06 06:16:31');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (18, 12, 16, '/quite/stuff/system/single.pdf', '/page/doctor/face/current.mp4', 'accepted', 'Six memory price trial speak reach Congress. Dream option employee side different upon. Test happy nice traditional manage not.', '2011-02-17 06:28:41');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (19, 14, 15, '/must/record/theory/world.pdf', '/might/value/number/shake.mp4', 'accepted', 'Board I cause first green sport. Occur whether chance easy they open interest.', '1982-11-04 11:53:14');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (20, 15, 5, '/even/eat/certain/American.pdf', '/sea/open/west/catch.mp4', 'rejected', 'Public stay push store American according. Democratic mission young.', '2010-10-21 18:24:54');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (21, 17, 3, '/agree/give/ball/single.pdf', '/rest/high/service/his.mp4', 'accepted', 'Age knowledge put class nation able never bed. Middle over read heavy couple. Young learn phone born.', '2024-07-29 15:52:14');
INSERT INTO public.lamaran OVERRIDING SYSTEM VALUE VALUES (22, 19, 5, '/prevent/get/perform/prepare.pdf', '/home/I/imagine/place.mp4', 'rejected', 'Physical oil son. Growth development perhaps whole interest suffer foot.', '1983-08-01 14:24:30');