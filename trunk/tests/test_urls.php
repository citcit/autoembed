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
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * AutoEmbed is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with AutoEmbed.  If not, see <http://www.gnu.org/licenses/>.
 */

$test_urls = array(
   'YouTube' => 'http://www.youtube.com/watch?v=tGEz31RA4es',
   'YouTube (Playlists)' => 'http://uk.youtube.com/view_play_list?p=7262E1895FA61B39',
   'Dailymotion' => 'http://www.dailymotion.com/video/xx1bs_numa-numa-dance_fun',
   'Google Video' => 'http://video.google.com/videoplay?docid=-6377855743675143177',
   'BBC News' => 'http://news.bbc.co.uk/media/emp/7600000/7605000/7605054.xml',
   'BBC Iplayer (UK Only)' => 'http://www.bbc.co.uk/iplayer/episode/b00dk77f/b00dk779/',
   'MetaCafe' => 'http://www.metacafe.com/watch/1669953/the_transporter_3/',
   'Veoh' => 'http://www.veoh.com/videos/v15993987HFkgjngx',
   'Revver' => 'http://revver.com/video/889225/okinawa-japan-17-worlds-largest-tug-of-war',
   'Vimeo' => 'http://vimeo.com/45084',
   '123video' => 'http://www.123video.nl/playvideos.asp?MovieID=67244',
   '5min Life Videopedia' => 'http://www.5min.com/Video/Quick-Tip-Knife-Technique-30438039',
   '9You' => 'http://v.9you.com/watch/xuzegfifj.html',
   'ABC News' => 'http://abcnews.go.com/video/playerIndex?id=6572739',
   'AdultSwim' => 'http://www.adultswim.com/video/?episodeID=8a2505951bc80ed4011c2e6c015b0421',
   'AniBoom' => 'http://www.aniboom.com/video/270647/Monday-Morning/?ref=/homepage/video/',
   'AOL Video' => 'http://video.aol.com/partner/vh1/real-chance-of-love-toughest-elimination-yet/mgid:cms:mvideo:vh1.com:100867',
   'Archive.org' => 'http://www.archive.org/download/Sita04_BattleofLanka/Sita04_BattleofLanka_sorensen.flv',
   'Atom' => 'http://www.atom.com/funny_videos/mccaingels_103/',
   'Bebo' => 'http://bebo.161.download.videoegg.com/gid329/cid1124/LC/D8/1211993690XyKXuBnaZtd9ZRftvoVo',
   'Blip' => 'http://blip.tv/play/AZOkQITuPw',
   'BoFunk' => 'http://www.bofunk.com/e/nockbcznzgghpdaeakupibegbqgmdaothtyuwxy',
   'BooMp3' => 'http://boomp3.com/listen/c0zjau3_p',
   'Break (SEO Style)' => 'http://embed.break.com/NDk1MzQw',
   'Break (User Content)' => 'http://embed.break.com/NDk1MzQw',
   'Brightcove.com' => 'http://link.brightcove.com/services/link/bcpid1640183817/bctid1747278475',
   'Brightcove.tv' => 'http://www.brightcove.tv/title.jsp?title=1749425761&channel=340485641',
   'Broadcaster' => 'http://www.broadcaster.com/video/external/player.swf?clip=916814_624724428_Zombies_20new.flv',
   'CarPix Tv' => 'http://carpixtv.vidiac.com/video/ad98f9ea-70c7-4987-a724-9b1300cf1f18.htm',
   'Cellfish' => 'http://cellfish.com/video/351705/Numa',
   'Clarin' => 'http://www.videos.clarin.com/index.html?id=950515',
   'Clip.vn' => 'http://clip.vn/watch/Viet-Nam-Idol-2008-tai-TPHCM-15-09-2008-/WLik,vn?fm=1',
   'ClipFish (Old)' => 'http://clipfish.de/video/2651310/britney-singt-schief',
   'ClipFish (New)' => 'http://clipfish.de/video/2651310/britney-singt-schief',
   'ClipJunkie' => 'http://www.clipjunkie.com/Mythbusters-Fun-With-Air-vid3976.html',
   'ClipLife' => 'http://www.cliplife.jp/clip/?content_id=j8cp0lhx',
   'ClipMoon' => 'http://www.clipmoon.com/videos/7110d8/-car-accidents-terrible-crash-mclaren-.html',
   'Clipser' => 'http://clipser.com/watch_video/378901',
   'ClipShack' => 'http://clipshack.com/Clip.aspx?key=9330D2F8E5CB7000',
   'Cold-Link' => 'http://cold-link.com/play/80363341',
   'CollegeHumor' => 'http://www.collegehumor.com/video:1828310',
   'Comedy Central (Daily Show)' => 'http://www.thedailyshow.com/video/index.jhtml?videoId=215172&title=The-Bush-Years:-The-2000-Election',
   'Comedy Central (Colbert Report)' => 'http://www.comedycentral.com/colbertreport/videos.jhtml?videoId=171133',
   'Comedy Central' => 'http://www.comedycentral.com/videos/index.jhtml?videoId=168158&title=tommy-davidson-terrorism',
   'Crackle' => 'http://www.crackle.com/c/Jace_Hall/Jace_Hall_Ep_13_SEASON_FINALE_/2366278#ml=o%3d12%26fpl%3d297691%26fx%3d',
   'CrunchyRoll' => 'http://www.crunchyroll.com/getitem?ih=opq8213o979nq084so5&videoid=7732&mediaid=3802&hash=opq8213o979nq084so5',
   'Current' => 'http://current.com/e/88997642',
   'Dailyhaha' => 'http://www.dailyhaha.com/_vids/girl_scount_thiefs.htm',
   'Dave.tv' => 'http://dave.tv/MediaPlayer.aspx?contentItemId=32824',
   'Deezer' => 'http://www.deezer.com/track/11000',
   'DotSub' => 'http://dotsub.com/view/0c504c81-cebc-4370-bf94-b20fce57c38f',
   'DoubleViking' => 'http://doubleviking.cachefly.net/videos/doubleviking/2008/06/03/french-girl.flv',
   'Dropshots' => 'http://media1.dropshots.com/photos/99384/20061116/181618.flv',
   'Dv.ouou' => 'http://dv.ouou.com/play/v_15aea629e3acf9.html',
   'Divshare' => 'http://www.divshare.com/download/5925984-2b2',
   'EASportsWorld' => 'http://videocdn.easw.easports.com/easportsworld/media/7499/912A0001_1_FLV_VIDEO_OUh.flv',
   'EbaumsWorld Audio' => 'http://media.ebaumsworld.com/audio/mikeyp/Armaggedon.mp3',
   'EbaumsWorld Videos' => 'http://www.ebaumsworld.com/mediaplayer.swf?file=http://media.ebaumsworld.com/mediaFiles/video/526693/475057.flv',
   'ESPN' => 'http://sports.espn.go.com/broadband/video/videopage?videoId=3799899',
   'Excessif (DVDrama)' => 'http://www.excessif.com/video/index.php?flashvideo=watchmen_trailer_fr.flv',
   'Facebook' => 'http://www.facebook.com/video/video.php?v=65568150143',
   'FunnyOrDie' => 'http://www.funnyordie.com/videos/aac8052585/15000yellow-postits-from-aaronlson5',
   'G4TV' => 'http://www.g4tv.com/xplay/videos/28510/Rock_Band_2_Launch_Party_All_Access.html',
   'GameKyo' => 'http://www.gamekyo.com/video12982_tales-of-hearts-cg-new-video.html',
   'GameSpot' => 'http://uk.gamespot.com/ps3/adventure/residentevil5/video/6191975/resident-evil-5-interview',
   'GameTrailers (inc. User Movies)' => 'http://www.gametrailers.com/player/usermovies/258940.html',
   'GameTube' => 'http://www.gametube.org/?#/video/J/4TZF45mGCjQAm_n8w_9V4PfVfw=',
   'GameVideos.1up' => 'http://gamevideos.1up.com/video/id/21213',
   'GarageTv' => 'http://www.garagetv.be/v/S5cyfREd!EvQBVM8-ZXkwFPSjFFxoVnf0LSagycZ8pH--wBBPzAyy!usb-Wfkfbas5/v.aspx',
   'Gloria' => 'http://www.gloria.tv/?video=m0icjgniybkvnuclkbvy',
   'GoEar' => 'http://www.goear.com/listen.php?v=31cfa62',
   'Glumbert' => 'http://glumbert.com/media/malegymnast',
   'GodTube' => 'http://www.godtube.com/view_video.php?viewkey=9c69d4acc9dd49eaf89f',
   'GoFish (Videos)' => 'http://www.gofish.com/player.gfp?gfid=30-1015446',
   'GoFish (Channels)' => 'http://www.gofish.com/channel.gfp?gfid=50-2931&videoGfid=30-1127078',
   'GotGame' => 'http://tv.gotgame.com/flvideo/52.flv',
   'GrassRoots ItvLocal' => 'http://grassroots.itvlocal.com/Clip.aspx?key=C06D89C1B42F1829',
   'GrindTv' => 'http://www.grindtv.com/video/moto/robbie_maddison_nails_it_jumps_120ft_to_top_of_arc_de_triomphe_1/',
   'Guba' => 'http://www.guba.com/watch/3000006587',
   'TheHub' => 'http://hub.witness.org/en/node/8754',
   'Hulu (Usa Only)' => 'http://www.hulu.com/watch/19989/the-simpsons-homer-evolution',
   'Humour' => 'http://video.humour.com/videos-comiques/videos/01218423cfb3716cd9fb2d43a35a5df5.flv',
   'Video.i.ua' => 'http://i1.i.ua/video/vp2.swf?9&userID=247839&videoID=57480&playTime=226&repeat=0&autostart=0&videoSize=21006136&userStatus=0&notPreview=0&mID=2',
   'IGN' => 'http://uk.movies.ign.com/dor/objects/826378/quantum-of-solace/videos/quantum_timdezeeuw.html',
   'iJigg' => 'http://www.ijigg.com/songs/V2CDGE0FPB0',
   'IMDB' => 'http://www.imdb.com/video/screenplay/vi1950351385/',
   'Imeem (Music)' => 'http://media.imeem.com/m/k8RLAG2sN7',
   'Imeem (Playlists)' => 'http://media.imeem.com/pl/5ei3osBD06',
   'Imeem (Video)' => 'http://media.imeem.com/v/zww-dvfR8y',
   'ImageShack' => 'http://img531.imageshack.us/my.php?image=duganja2.flv',
   'IndyaRocks' => 'http://www.indyarocks.com/videos/Greenpeace-earth-is-breathing-Commercial-177158',
   'Izlesene' => 'http://www.izlesene.com/video/komik_videolar-chelsea-nin-maskotu/402189',
   'Jamendo' => 'http://www.jamendo.com/en/album/20537',
   'Jokeroo' => 'http://www.jokeroo.com/funnyvideos/bill_clinton_denied_kiss.html',
   'Joost' => 'http://www.joost.com/044001b/t/Creature-Comforts-Merry-Christmas-Part-1',
   'Jubii Tv' => 'http://tv.jubii.co.uk/video/iLyROoafYAu8.html',
   'JujuNation Video' => 'http://www.jujunation.com/viewVideo.php?video_id=4560&title=Mapouka___Nikwes___Mapouka_Cellulaire&cid=',
   'JujuNation Audio' => 'http://www.jujunation.com/music.php?music_id=229&title=testing',
   'JumpCut' => 'http://www.jumpcut.com/view/?id=22892FC2DF8611DCAA77000423CEF5F6',
   'JustinTV' => 'http://www.justin.tv/flamegoat',
   'Kewego' => 'http://www.kewego.co.uk/video/iLyROoafY7tD.html',
   'Koreus' => 'http://www.koreus.com/video/tortue-usb.html',
   'Last.fm (Audio)' => 'http://www.last.fm/music/The+Kooks/_/Naive?autostart',
   'Last.fm (Videos)' => 'http://www.last.fm/music/Blink-182/+videos/12008147',
   'Libero' => 'http://video.libero.it/app/play?id=daed2f29e33f1ff16c91428f22f1477e',
   'LiveLeak' => 'http://www.liveleak.com/view?i=fa4_1172336556',
   'LiveVideo' => 'http://www.livevideo.com/video/001AB3E1FB2440C9831782D78070503E/numa-numa-music-video.aspx',
   'Machinima (Old)' => 'http://machinima.com/film/view&id=28879',
   'Machinima (New)' => 'http://machinima.com:80/f/f37abee44d63333bbe3c96ace97751a2',
   'Video.mail.ru' => 'http://video.mail.ru/mail/trickfun/3/8.html',
   'MegaVideo' => 'http://www.megavideo.com/?v=LQ24A1SZ',
   'Milliyet' => 'http://video.milliyet.com.tr/m.swf?id=20732&tarih=2008/09/11',
   'MoFile' => 'http://tv.mofile.com/7OFDP585',
   'MotionBox' => 'http://www.motionbox.com/videos/7996d0b5191ff6',
   'Mpora' => 'http://video.mpora.com/watch/UsubGMvST/',
   'Mpora TV' => 'http://tv.mpora.com/watch/iSRI7eJnx/',
   'Mp3tube' => 'http://www.mp3tube.net/play.swf?id=4264554e8bdedc3d625b42409179fb91',
   'MSN Live/Soapbox' => 'http://video.msn.com/video.aspx?vid=e039eb60-1ba0-4b47-ab0d-941626231c8f',
   'MtvU (Usa Only)' => 'http://www.mtvu.com/video/?id=1592281&vid=264273',
   'MusOpen' => 'http://www.musopensource.com/files/Ludwig%20van%20Beethoven/Symphony%20No.%205%20in%20C%20Minor,%20Op.%2067%20-%20I.%20Allegro%20con%20brio.mp3',
   'MyNet' => 'http://video.eksenim.mynet.com/perestis/hakemde_para_kalmadi_komik/199941/',
   'MySoccerMedia' => 'http://mysoccermedia.com/videos/74483e11660ed6e.flv',
   'MyShows.cn (SeeHaha.com)' => 'http://www.seehaha.com/flash/player.swf?vidFileName=31614080605619086.flv',
   'MySpaceTv' => 'http://vids.myspace.com/index.cfm?fuseaction=vids.individual&VideoID=41173982',
   'MyVideo' => 'http://www.myvideo.de/watch/2480593/O_zone_Dragosta_Din_Tei_Numa_Numa',
   'MyVi' => 'http://myvi.ru/ru/flash/player/oYgfJNg6z-zbk2XKv_Ak6rWauEDWoOLAf6Dpkxgj0t2I1',
   'M Thai' => 'http://video.mthai.com/player.php?id=14M1178699702M218',
   'NewGrounds' => 'http://uploads.ungrounded.net/123000/123876_peonbond1.swf',
   'NhacCuaTui' => 'http://nhaccuatui.com/nghe?M=k1WaVuxlvY',
   'OffUHuge' => 'http://www.offuhuge.com/media/198014/Obama_and_McCain_-_Dance_Off/',
   'OnSmash' => 'http://videos.onsmash.com/v/IT1EMLzmzQ7u9lvS',
   'Orb' => 'http://mycast.orb.com/orb/html/qs?mediumId=OJwKeGsP&l=sco0by',
   'Passionato (Single Preview)' => 'http://www.passionato.com/play/track/2879',
   'Passionato (Playlist Preview)' => 'http://www.passionato.com/play/release/505',
   'Photobucket' => 'http://s183.photobucket.com/albums/x275/nicole765_2007/?action=view&current=delte610.flv',
   'PikNikTube' => 'http://www.pikniktube.com/v/fe10505af9fe83c1d7270fffb913a284/u/262567/ARAGONES_%DDmzalad%FD%21',
   'Project Playlist' => 'http://www.playlist.com/node/2896442',
   'Putfile' => 'http://media.putfile.com/Motorcycle-jump?pos=home',
   'Rambler' => 'http://vision.rambler.ru/users/forum-bumerang/1/119/',
   'RawVegas' => 'http://www.rawvegas.tv/watch.php?vID=449f9394c456a4fb3f3b30de5c6bfd',
   'ScreenToaster' => 'http://www.screentoaster.com/watch/stV0pWS0VLRllbQV1ZXFlf',
   'Seeqpod' => 'http://www.seeqpod.net/search/?plid=3e10a35644',
   'SevenLoad' => 'http://en.sevenload.com/videos/GIaE01F-Classic-Television-Commercials-Part-I',
   'ShareView' => 'http://www.shareview.us/view/344/best-of-family-guy-really-funny/',
   'Sharkle' => 'http://www.sharkle.com/externalPlayer/59083/4iyii41ya/3/',
   'Sina Podcast' => 'http://you.video.sina.com.cn/b/15860970-1511607405.html',
   'Smotri' => 'http://smotri.com/video/view/?id=v435023923d',
   'Snotr' => 'http://www.snotr.com/video/1210',
   'SouthPark Studios' => 'http://www.southparkstudios.com/clips/183600',
   'Space.tv.cctv.com' => 'http://space.tv.cctv.com/act/video.jsp?videoId=VIDE1212992324839168',
   'Spike' => 'http://www.spike.com/video/don-lafontaine-voice/3028523',
   'Songza' => 'http://songza.com/e/listen?zName=Metallica%20-%20Fade%20to%20Black&zId=a2r3-wiy5kDOVSLo',
   'SportsLine (CBS Sports)' => 'http://www.sportsline.com/video/player/play/nfl/Iv6DfSSscYBAXmubr_lYnxLQ_UP8NC_R',
   'Streetfire' => 'http://videos.streetfire.net/video/c47d3e81-ee2a-4cc7-84d7-9b0701566c76.htm',
   'StupidVideos' => 'http://www.stupidvideos.com/video/Woman_Vs_Parking_Gate/#170731',
   'TagTele' => 'http://www.tagtele.com/videos/voir/25744',
   'TinyPic' => 'http://tinypic.com/player.php?v=2prd7gk&s=3',
   'Tm-Tube' => 'http://www.tm-tube.com/video/1350/zoom-zoom',
   'TrailerAddict' => 'http://www.traileraddict.com/emb/5338',
   'TrTube' => 'http://www.trtube.com/mediaplayer_3_15.swf?file=http://www.trtube.com/vid2/77983.flv',
   'Trilulilu' => 'http://www.trilulilu.ro/sor_23/92b301ead3a62b',
   'Tu' => 'http://tu.tv/tutvweb.swf?xtp=312541',
   'Tudou' => 'http://hd.tudou.com/program/13135/',
   'UOL VideoLog' => 'http://videolog.uol.com.br/video.php?id=326472',
   'UUME' => 'http://pic.uume.com/play_rLskkin8EYmI.html',
   'u-Tube' => 'http://www.u-tube.ru/pages/video/28512/',
   'VideoJug' => 'http://www.videojug.com/film/player?id=6bdae9a1-d8c8-5c06-3b58-ff0008ca6bff',
   'videos.sapo' => 'http://videos.sapo.pt/bpi7lZg8Wi8nNd1mZZWF',
   'Vidiac' => 'http://www.vidiac.com/video/b3645fb3-e6f6-4b40-ae26-0ae2bd56c0a3.htm',
   'Viddler' => 'http://www.viddler.com/player/6d7b8644/',
   'Videa' => 'http://videa.hu/videok/zene/kaiser-chiefs-never-miss-a-beat-dHMG1NcrrqWevOI3',
   'VideoNuz' => 'http://www.videonuz.com/videonuz.swf?videoLink=video_wejpjpofuq.flv&resim=video_gqteiqhplf.jpg',
   'VidiLife' => 'http://www.vidilife.com/flash/flvplayer.swf?xml=http://www.vidiLife.com/media/play_flash_xml.cfm?id=A3C2545D-2BA0-41B0-BA02-B&f=flash8&embed=true',
   'VidMax' => 'http://vidmax.com/video/56755/JoJo_from_K_Ci_and_JoJo_passes_out_while_performing_on_stage/',
   'Vidivodo' => 'http://www.vidivodo.com/VideoPlayerShare.swf?lang=en&vidID=164690&vCode=v200807062126330164690&dura=116&File=vidservers/server01/videos/2008/07/06/21/v200807062126330164690.flv',
   'VoiceThread' => 'http://voicethread.com/share/21651/',
   'VSocial (Type1)' => 'http://www.vsocial.com/video/?d=85763',
   'VSocial (Type2)' => 'http://www.vsocial.com/ups/acb6e0ea047ee8f7868f19716b41f8cf',
   'WeGame' => 'http://www.wegame.com/watch/Trackmania_Unnamed_Meme/',
   'Wipodo' => 'http://www.wipido.com/video/1054',
   'Yahoo Video' => 'http://video.yahoo.com/watch/3434337/9582517',
   'Yahoo Video HK' => 'http://hk.video.yahoo.com/video/video.html?id=374869',
   'Yahoo Music Videos' => 'http://new.music.yahoo.com/J-Xavier/videos/view/Go-Tell-Your-Mama-To-Vote-For-Obama--58952262',
   'YouKu' => 'http://v.youku.com/v_show/id_XNDE2NDI3MDA=.html',   
 );

?>
