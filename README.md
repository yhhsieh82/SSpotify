# SSpotify
my first php/laravel project imitating Spotify

http://sspotify.us-east-2.elasticbeanstalk.com


實作項目：
一、以php/Laravel實現後端資料存取、呈現

 1. Playlist(播放清單）

	-index:
	  展示當前使用者所有的播放清單
	  技術:
	      如何設計DB表格來實現播放清單所擁有的歌曲？
	      在此設計下，如何利用SQL存取該播放清單內的所有歌曲？(join)
	      
	-show:
	  展示播放清單內所有歌曲
	  
	-update:
 	  將某一首歌自播放清單內刪除
	  
	-addMusic:
	  將某一首歌加入播放清單
	  
 2. Album(專輯）:
 
    -index:
     展示音樂庫中所有專輯
     
	-show:
	 展示專輯內所有歌曲，支援加入使用者的歌單 
     
	-without update, delete, store:
	 模擬spotify，使用者並非創作者所以無法修改歌曲。
  
二、以javascript/jquery/ajax實現
 
 1. music player（）:
    
    -點擊播放清單內某一首歌可以實現在播放器中播放該清單內的歌曲
    
    -選擇下/上一曲，調整音量
    
    -呈現當前播放歌曲名稱、創作者、專輯封面
    
    


