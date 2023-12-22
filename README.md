Here's a project I made to show my wife she's special, so she has something nobody else has. I call it the ClockFrame.

It's a wifi AP hosting bananapi m2zero with a wisecco 5" round LCD housed inside a clock shell. I chose a clock with L shaped pressure clips in the back to sandwich it all together, and printed a custom designed bezel to hold the screen in place.
It does not connect to the internet by design, there are tons of google drive fed photo frames, I did not want this. Instead it hosts it's own interface for file management / FBI manipulation.
I set up armbian server to host a web dash for controlling the framebuffer imageviewer instance that is started at boot time.
I initially wanted battery backup to provide enough time to safely power down the device in the event of power failure but scrapped it due to the metal housing of the clock shorting pins occasionally and generally unpredictable/unsafe performance of the UPS hat.

I tried to include the most pertinent configuration files to showcase what I did behind the scenes to make it all happen.
I only included a few samples of the C files I compiled to make the webapp work and make FBI interactive, as it's very simple and just pretends we are using an attached keyboard to control the slideshow.
Commandline arguments provided in .bashrc drive the initial photo hold time and other parameters such as framebuffer resolution. this can be changed on the fly with the custom exec field at the bottom of the web dash for full control or at the top for just slideshow timing.

This is the final version with files copied from my actual working project. I may have copied the wrong .bashrc I  believe it is using the root .bashrc with some logic to generate a list of files to be used in the slideshow on shutdown and reboot so things are always updated.
To back it up, I simply power off through the web dash, eject the SD card and do a dd backup to an img then pipe it to GZ to get a backup.img.gz
Included are some photos during assembly and programming, as well as finished photos.
You are free to use my configurations for your own projects as you like.
Some of the things I used in this project are *NOT* cool to be used commercially without the author's consent, so please do read about the licensing of things you plan on using in commercial projects.
I did fail to pull the favicon and custom filebrowser branding I created for the ClockFrame, it came out really nice.

BOM:
wisecco 5" round screen with video driver/power board: $128 at time of purchase (they do have a 4" version for much cheaper now)
bananapi m2zero: ~$30 shipped
bezel : < $2 PLA filament and borrowing printer
clock : $15 at Target
2 to 1 usb micro male (2) to female (1) adapter : $2
hdmi mini with FPC cable : $10.74 (to link bpi to screen inside case)
wifi antenna: salvaged from old dell streak tablet / free (a few cents or dollars on market)
RGB led, diffused: $2 shipped 10pcs
UPS hat (later removed):$20 shipped
Total: ~$200

Special shoutout to the following people/projects, I couldn't do any of this without the hard work of others!:
FileBrowser team
DropZone team
Armbian community, developers, project maintainers, and special shoutout to Igor who without meaning to left me tons of advice on the forums.
FBI creator 
open source software in general
Bananapi team for making the board and giving the community something to build off
