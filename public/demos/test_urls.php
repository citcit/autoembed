<?php
/**
 * This file is part of AutoEmbed.
 * http://code.google.com/p/autoembed/
 *
 * Some regular expressions found in this file were borrowed
 * from Karl Benson & Rene-Gilles Deberdt.
 *
 *
 * AutoEmbed is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * AutoEmbed is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with AutoEmbed.  If not, see <http://www.gnu.org/licenses/>.
 */

$verified_urls = array(
  'YouTube' => 'http://www.youtube.com/watch?v=z3U0udLH974',
  'YouTube (Playlists)' => 'http://www.youtube.com/watch?v=twvzm27TB4I&feature=PlayList&p=595A40209CB17411&index=0&playnext=1',
  'Dailymotion' => 'http://www.dailymotion.com/relevance/search/cats/video/x6ycl8_stalking-cat_fun',
  'Google Video' => 'http://video.google.com/videoplay?docid=5573921179750811749&ei=xu9kSZLsG5HEqQK6mO2rDQ&hl=en',
  'MegaVideo' => 'http://megavideo.com/?v=PRNQ70YM',
  'MetaCafe' => 'http://www.metacafe.com/watch/2116137/cat_playing_dead/',
  'Veoh' => 'http://www.veoh.com/videos/e58531gnEb2FwE?rank=0&jsonParams={%22numResults%22%3A20%2C%22rlmin%22%3A0%2C%22query%22%3A%22cat%22%2C%22rlmax%22%3Anull%2C%22veohOnly%22%3Atrue%2C%22order%22%3A%22default%22%2C%22range%22%3A%22a%22%2C%22sId%22%3A%22227617188726342358%22}&searchId=227617188726342358&rank=1',
  'Revver' => 'http://revver.com/video/1404959/cute-calico-kitten-playing-with-ribbon/',
  'Vimeo' => 'http://vimeo.com/912248',
  '123video' => 'http://www.123video.nl/playvideos.asp?MovieID=438011',
  '5min Life Videopedia' => 'http://www.5min.com/Video/How-To-Give-a-Shot-to-a-Cat-80416644',
  '9You' => 'http://v.9you.com/watch/xuzegfifj.html',
  'AniBoom' => 'http://www.aniboom.com/video/302103/Rassa-Park/',
  'AOL Video (New)' => 'http://video.aol.com/video/funny-cat/2018555',
  'AOL Video (Old)' => 'http://video.aol.com/partner/vh1/real-chance-of-love-toughest-elimination-yet/mgid:cms:mvideo:vh1.com:100867',
  'Atom' => 'http://www.atom.com/funny_videos/3EFBFFFF01962AEF001700A61129/',
  'Blastro' => 'http://www.blastro.com/player/tibigthingspoppindoit.html',
  'Blip' => 'http://blip.tv/file/1642545/',
  'BoFunk' => 'http://www.bofunk.com/video/2986/fruitcake_lady.html',
  'BoingBoing TV' => 'http://tv.boingboing.net/2008/12/30/boing-boing-tv-best-1.html',
  'Brightcove.com' => 'http://link.brightcove.com/services/link/bcpid1640183817/bctid1747278475',
  'Break' => 'http://www.break.com/usercontent/2008/3/cat-472832.html',
  'CarPix Tv' => 'http://carpixtv.vidiac.com/video/a5e36052-2646-441d-b6a3-9b8700b5edb0.htm',
  'CBSNews' => 'http://www.cbsnews.com/video/watch/?id=4696315n',
  'Cellfish' => 'http://cellfish.com/video/94896/Crunk-Chicken',
  'Clarin' => 'http://www.videos.clarin.com/index.html?id=1013135',
  'Clip.vn' => 'http://clip.vn/watch/Ban-thang-tuyet-dieu-cua-Cong-Vinh/Wftu,vn',
  'ClipJunkie' => 'http://www.clipjunkie.com/How-To-Wash-A-Cat-vid677.html',
  'ClipLife' => 'http://cliplife.jp/clip/?content_id=lj8xfnh9',
  'ClipMoon' => 'http://www.clipmoon.com/videos/91464f/dog-cat-and-printer.html',
  'Clipser' => 'http://www.clipser.com/watch_video/1138796',
  'ClipShack' => 'http://www.clipshack.com/Clip.aspx?key=EB3AF65602EE8D33',
  'CNetTV' => 'http://cnettv.cnet.com/2001-1_53-50003704.html',
  'CollegeHumor' => 'http://www.collegehumor.com/video:1892568',
  'TheDailyShow' => 'http://www.thedailyshow.com/video/index.jhtml?videoId=213380&title=strip-maul',
  'ColbertNation' => 'http://www.colbertnation.com/the-colbert-report-videos/76104/september-28-2006/un-american-news---spain',
  'ComedyCentral' => 'http://www.comedycentral.com/videos/index.jhtml?videoId=166951&title=osama-hunt',
  'Crackle' => 'http://crackle.com/c/The_Groundlings/The_Groundlings_Phone_Calls/2419972#ml=fis%3d%26fp%3d1%26fx%3d',
  'Current' => 'http://current.com/items/89665458/rebel_chef_collective.htm',
  'Dailyhaha' => 'http://www.dailyhaha.com/_vids/cats_extreme_peel_out.htm',
  'Deezer' => 'http://www.deezer.com/track/you-really-got-me-T3604',
  'DotSub (w/o Captions)' => 'http://dotsub.com/view/096f855d-62ad-4c80-99b7-502137d8fc96',
  'Divshare' => 'http://www.divshare.com/download/5610050-4db',
  'EbaumsWorld Audio' => 'http://www.ebaumsworld.com/audio/play/1044661/',
  'EbaumsWorld Videos' => 'http://www.ebaumsworld.com/video/watch/80452670/',
  'ESPN' => 'http://espn.go.com/video/clip?id=3807056',
  'Fandome' => 'http://gamecocks.fandome.com/video/80199/Simpsons-Lisa-wont-be-a-Gamecock/',
  'Flickr' => 'http://www.flickr.com/photos/josefgrunig/2825797774/in/pool-video',
  'FunnyOrDie' => 'http://www.funnyordie.com/videos/6342db2270/head-over-heels-literal-video-version-from-dustfilms',
  'G4TV' => 'http://www.g4tv.com/xplay/videos/35891/Gaming_Update_010609.html',
  'GameKyo' => 'http://www.gamekyo.com/videoen13904_tales-of-the-world-radiant-mythology-2-gameplay-video.html',
  'GameSpot' => 'http://www.gamespot.com/xbox360/action/grandtheftautoivthelostanddamned/video/6202321/grand-theft-auto-iv-the-lost-and-damned-trailer',
  'GameTrailers' => 'http://www.gametrailers.com/player/44055.html',
  'Gametube.org' => 'http://www.gametube.org/#/video/Ho77TseDliGlXcYXwjwYGjBUEtc=',
  'GameVideos.1up' => 'http://gamevideos.1up.com/video/id/22680',
  'Gloria' => 'http://www.gloria.tv/?video=zftpfp5xntxeibe2diak',
  'Glumbert' => 'http://www.glumbert.com/media/vacuum',
  'GoEar' => 'http://www.goear.com/listen.php?v=1218407',
  'GodTube' => 'http://www.godtube.com/view_video.php?viewkey=9c69d4acc9dd49eaf89f',
  'GotGame' => 'http://video.gotgame.com/index.php/video/view/5346/Mega_Man_3_Review',
  'GrassRoots ItvLocal' => 'http://grassroots.itvlocal.com/Clip.aspx?key=C06D89C1B42F1829',
  'Guzer' => 'http://www.guzer.com/videos/sandals-glued-to-the-floor.php',
  'TheHub' => 'http://hub.witness.org/en/node/32',
  'Howcast' => 'http://www.howcast.com/videos/43990-How-To-Fit-in-on-Your-First-Day-Of-Work',
  'Hulu (Usa Only)' => 'http://www.hulu.com/watch/53456/saturday-night-live-update-larry-the-goose',
  'IGN' => 'http://movies.ign.com/dor/objects/14299069/che/videos/che_pt2_exclip_010609.html',
  'iJigg' => 'http://www.ijigg.com/songs/V2407GG0PA0',
  'Imeem (Music)' => 'http://www.imeem.com/jukeboxmusic16/music/1nxmt1tc/sigur_ros_saeglpur/',
  'Imeem (Playlists)' => 'http://www.imeem.com/aquilles/playlist/JjGvrTeV/sigur_ros_music_playlist/',
  'Imeem (Video)' => 'http://www.imeem.com/rockvideos/video/5WFYXI79/sigur_ros_glsli/',
  'IndyaRocks' => 'http://www.indyarocks.com/videos/Cute-Children-273945',
  'iReport' => 'http://www.ireport.com/docs/DOC-184806',
  'Izlesene' => 'http://www.izlesene.com/video/sinema-arog/243506',
  'Jamendo' => 'http://www.jamendo.com/en/album/31187',
  'Joost' => 'http://www.joost.com/094mdpi/t/CSI-19-Down?channel=094009g#id=094mdpi',
  'Jubii Tv' => 'http://tv.jubii.co.uk/video/iLyROoaftQrN.html',
  'JujuNation Video' => 'http://www.jujunation.com/viewVideo.php?video_id=3014&title=Mapouka___Hot_Mapouka___1',
  'JujuNation Audio' => 'http://www.jujunation.com/music.php?music_id=5&title=Sweet_Talks___Angelina',
  'JumpCut' => 'http://www.jumpcut.com/view?id=E8E91E2CB05311DDA8C7000423CF3686',
  'JustinTV' => 'http://www.justin.tv/apes',
  'Koreus' => 'http://www.koreus.com/video/telephone-portable-mais-popcorn.html',
  'Last.fm (Audio)' => 'http://www.last.fm/music/Sigur+R%C3%B3s/_/Gobbledigook',
  'Last.fm (Video)' => 'http://www.last.fm/music/Sigur+R%C3%B3s/+videos/6102097',
  'Libero' => 'http://video.libero.it/app/play/index.html?id=37efe0895e88c2b1938ac79909f2c4df',
  'LiveLeak' => 'http://www.liveleak.com/view?i=94b_1231356979',
  'LiveVideo' => 'http://www.livevideo.com/video/strayfer/61C2D0B0AF5C4DE39FAC572D19611ED2/new-year-new-look.aspx',
  'Machinima (Old)' => 'http://www.machinima.com/film/view&id=31989',
  'Machinima (New)' => 'http://machinima.com:80/f/f37abee44d63333bbe3c96ace97751a2',
  'MadnessVideo' => 'http://www.madnessvideo.net/videos.aspx/video~give_me_cuppy_cake/Give_Me_Cuppy_Cake/Funny_videos/',
  'Milliyet' => 'http://video.milliyet.com.tr/m.swf?id=20732&tarih=2008/09/11',
  'MoFile' => 'http://tv.mofile.com/7OFDP585',
  'MotionBox' => 'http://www.motionbox.com/videos/7996d0b5191ff6',
  'Mpora' => 'http://video.mpora.com/watch/QGjKFU4Wr/',
  'Mpora TV' => 'http://tv.mpora.com/watch/KnSR2bJ6K',
  'MSN Live/Soapbox' => 'http://video.msn.com/video.aspx?mkt=en-US&vid=53c9b8b7-1b73-4c2e-8870-b71d5ed00b2c',
  'MSNBC' => 'http://www.msnbc.msn.com/id/21134540/vp/28721511#28721510',
  'MtvU (Usa Only)' => 'http://www.mtvu.com/video/?id=1570773&vid=178499',
  'MusOpen' => 'http://www.musopen.com/view.php?type=piece&id=226',
  'MyNet' => 'http://video.eksenim.mynet.com/albeymeta/Korkun_ntikam/259284/c3947604309024d38e5a46ed78b54d78',
  'SeeHaha.com' => 'http://www.seehaha.com/flash/player.swf?vidFileName=31614080605619086.flv',
  'MySpaceTv' => 'http://vids.myspace.com/index.cfm?fuseaction=vids.individual&VideoID=49776296',
  'MyVideo' => 'http://www.myvideo.de/watch/3027771/Kleiner_Junge_tanzt_zu_Hardstyle',
  'NhacCuaTui' => 'http://www.nhaccuatui.com/nghe?M=nYAwcmJvLa',
  'OnSmash' => 'http://videos.onsmash.com/v/yYfxJEXIr1JZIG9C',
  'Orb' => 'http://mycast.orb.com/orb/html/qs?mediumId=OJwKeGsP&l=sco0by',
  'Passionato (Single)' => 'http://www.passionato.com/play/track/136109',
  'Passionato (Playlist)' => 'http://www.passionato.com/play/release/44115',
  'Rambler' => 'http://vision.rambler.ru/users/forum-bumerang/1/119/',
  'RawVegas' => 'http://www.rawvegas.tv/watch/new-years-las-vegas-2009-with-the-kardashians-heidi-and-spencer-and-ashlee-simpson-and-pete-wentz/cc5d4bc0d2f11b62211ebf5ad8129b',
  'ScreenToaster' => 'http://www.screentoaster.com/watch/stV0hVRkVLRllWQl1cW1Na',
  'Seeqpod' => 'http://www.seeqpod.com/search/?plid=84ef6d7488',
  'SevenLoad' => 'http://en.sevenload.com/videos/5wSQAup-Fight-Dad-Vs-Kids-Funny-Short-Film',
  'ShareView' => 'http://www.shareview.us/video/562/Cat-Mario-Half-the-game',
  'Smotri' => 'http://smotri.com/video/view/?id=v798759a9e5',
  'SouthPark Studios' => 'http://www.southparkstudios.com/clips/151728/',
  'Space.tv.cctv.com' => 'http://space.tv.cctv.com/act/video.jsp?videoId=VIDE1201677583717899',
  'Spike' => 'http://www.spike.com/video/alien-invaders-part/3090985',
  'SportsLine (CBS Sports)' => 'http://www.sportsline.com/video/player/play/videos/11ioZcgWVJ2a5u_IrDjSrN_tjknI0r9Z',
  'StupidVideos' => 'http://www.stupidvideos.com/video/all/Bunny_Hop_2/#184608',
  'Streetfire' => 'http://videos.streetfire.net/video/Skyline-GTR-launch-0-320_197665.htm',
  'TagTele' => 'http://www.tagtele.com/videos/voir/31022',
  'Ted.com' => 'http://www.ted.com/index.php/talks/joseph_pine_on_what_consumers_want.html',
  'TinyPic' => 'http://tinypic.com/player.php?v=dgqv6u&s=5',
  'Tm-Tube' => 'http://www.tm-tube.com/video/5325/shortmaps---mc-t35---00-05--97--',
  'Todays Big Thing' => 'http://technology.todaysbigthing.com/2009/01/26',
  'TrailerAddict' => 'http://www.traileraddict.com/trailer/black-dynamite/trailer',
  'Trilulilu' => 'http://www.trilulilu.ro/semaca/97de5b59225709',
  'Tudou' => 'http://www.tudou.com/programs/view/yf8AfkGC60o/',
  'UOL VideoLog' => 'http://videolog.uol.com.br/video.php?id=400093',
  'UUME' => 'http://pic.uume.com/play_rLskkin8EYmI.html',
  'u-Tube' => 'http://www.u-tube.ru/pages/video/23495/',
  'videos.sapo' => 'http://videos.sapo.pt/9G6TpSe6g0RttU5wIHnq',
  'Vidiac' => 'http://www.vidiac.com/video/bd0e5a2c-f390-4540-aaad-9b8a00e6e605.htm',
  'Videa' => 'http://videa.hu/videok/vicces/ha-a-biro-erosebb-eses-idiota-rIZ6OnE08qGy12IV',
  'VideoNuz' => 'http://videonuz.ensonhaber.com/haber-18237-jokey-attan-dustu.html',
  'VidMax' => 'http://www.vidmax.com/video/57949/Dad_Decides_To_Go_Down_A_Snow_Hill_On_Sons_Sled_And_Flies/',
  'VoiceThread' => 'http://voicethread.com/#q.b4622.i36067',
  'VSocial (Type1)' => 'http://www.vsocial.com/video/?d=84205',
  'VSocial (Type2)' => 'http://www.vsocial.com/ups/acb6e0ea047ee8f7868f19716b41f8cf',
  'WeGame' => 'http://www.wegame.com/watch/Clarity_Darkspear_VS_Heigan/',
  'Webshots' => 'http://good-times.webshots.com/slideshow/569712245TaJLlY',
  'Yahoo Video' => 'http://video.yahoo.com/watch/3480170/9682231',
  'Yahoo Video HK' => 'http://hk.video.yahoo.com/video/video.html?id=100322',
  'Yahoo Music Videos' => 'http://new.music.yahoo.com/singleVideo/?vid=29592290',
  'YouKu' => 'http://v.youku.com/v_show/id_XNjQyMDE1NjQ=.html',
 );

$wip_urls = array(
  'BBC News (UK Only)' => 'http://news.bbc.co.uk/1/hi/technology/7815574.stm',
  'BBC Iplayer (UK Only)' => 'http://www.bbc.co.uk/iplayer/episode/b00dk77f/b00dk779/',
  'ABC News' => 'http://abcnews.go.com/video/playerIndex?id=6578950',
  'AdultSwim' => 'http://www.adultswim.com/video/?episodeID=8a2505951ea6dcca011ead2664e1004b',
  'Archive.org' => 'http://www.archive.org/details/beyond_the_factory',
  'Bebo' => 'http://www.bebo.com/FlashBox.jsp?FlashBoxId=8249832626',
  'BooMp3' => 'http://boomp3.com/listen/c0zjau3_p',
  'Cold-Link' => 'http://cold-link.com/play/80363341',
  'CrunchyRoll' => 'http://www.crunchyroll.com/media-509768/Naruto-Shippuden-Episode-221-Homecoming.html',
  'Dave.tv' => 'http://dave.uktv.co.uk/video/totally-viral-animals/fancy-dress/',
  'DoubleViking' => 'http://www.doubleviking.com/videos/page0.html/a-very-annoying-wake-up-call-10821.html',
  'dropshots.com' => 'http://vodpod.com/watch/242431-dropshots-comprincessroses17',
  'Dv.ouou' => 'http://dv.ouou.com/dvplay.html?mn=%E7%88%86%E7%AC%91%20Baby%E6%90%9E%E7%AC%91%E7%9D%A1%E5%A7%BF%E7%B2%BE%E7%BC%96&ms=&id1=&id2=&mf=http://content.ouou.com/flv/2008/11/19/gx023.flv%20%20&msutf=&me=10&md=5',
  'EASportsWorld' => 'http://www.easportsworld.com/en_US/video/234988',
  'Facebook' => 'http://www.facebook.com/video/video.php?v=1059762339750',
  'FunMansion' => 'http://www.funmansion.com/videos/idiot_falls_through_roof.html',
  'GarageTv' => 'http://www.garagetv.be/video-galerij/blancostemrecht/CBC_Global_Warming_Doomsday_Called_Off_mp4.aspx',
  'Good.IS' => 'http://www.good.is/?p=15026',
  'GrindTv' => 'http://www.grindtv.com/video/surf/mick_fanning_with_his_new_resin8_tokoro/',
  'Humour' => 'http://www.humour.com/videos-comiques/videos.asp?VIDvideo=11924',
  'Video.i.ua' => 'http://video.i.ua/user/782893/8652/75483/',
  'IMDB' => 'http://www.imdb.com/video/screenplay/vi50004249/',
  'ImageShack' => 'http://img532.imageshack.us/flvplayer.swf?f=Trelay4life1gx3',
  'Jokeroo' => 'http://www.jokeroo.com/funnyvideos/mean_cat_bullies_dog.html',
  'Kewego' => 'http://www.kewego.com/video/iLyROoaftv7I.html',
  'Video.mail.ru' => 'http://video.mail.ru/mail/manzev/46/60.html?smslast_from_main=1',
  'Mp3tube' => 'http://www.mp3tube.net/br/musics/Sigur-Ros-Glosoli/177940/',
  'NewGrounds' => 'http://www.newgrounds.com/portal/view/475588',
  'Photobucket' => 'http://media.photobucket.com/video/cat/rodian/Videos/AthleticCat.flv?o=2',
  'PikNikTube' => 'http://www.pikniktube.com/v/fe10505af9fe83c1d7270fffb913a284/u/262567/ARAGONES_%DDmzalad%FD%21',
  'Project Playlist' => 'http://view.playlist.com/190165771',
  'Putfile' => 'http://media.putfile.com/Treadmill-Cats?pos=home',
  'RuTube' => 'http://rutube.ru/tracks/1056554.html',
  'Sharkle' => 'http://www.sharkle.com/video/205692/',
  'Snotr' => 'http://www.snotr.com/video/2077',
  'Songza' => 'http://songza.com/z/3tzyvd',
  'TrTube' => 'http://www.trtube.com/izle.php?v=unggudzest',
  'Tu.tv' => 'http://tu.tv/videos/the-boxing-cats',
  'VideoJug' => 'http://www.videojug.com/film/how-to-build-a-brick-wall-2',
  'Viddler' => 'http://www.viddler.com/explore/loopytube/videos/543/',
  'VidiLife' => 'http://www.vidilife.com/video_play_1285041_Evil_Monkey_Pushes_Baby_Into_Pool.htm',
  'Vidivodo' => 'http://www.vidivodo.com/229263/dont-stop-football-now',
  'You.Video.Sina.com.cn' => 'http://you.video.sina.com.cn/pg/topicdetail/topicPlay.php?tid=2353953&uid=1290055681#18191865',
);

?>
