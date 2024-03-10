 Λ L I Ξ V, WWDC KeyNote highlights
-----------

<p> <span style="color: yellow;">EROS /</span>
<span style="color: #ff00de;">-</span> <span style="color: aqua;">This is sample text</span>
</p>

Freefrom Ideas:
- Smooth Scroll // Try this (Not tested) > https://github.com/CristalT/scroll-delay
- Redirect without reload // Update data on a page without refreshing
- Implemented Web Player: Freelance Musician Can apply their songs to be played here.
- Update to Mega Hosting -> Register new mail for users, EA Cloud access unlimited storage
- Hiring Page / Send CV to email - hello@emiraliev.com
- Downloads Page, (YoutubeVidGrid + Apple Redirect Button Style) -> Cool CV's, different logo versions, Some other stuff
- Email subscription with news and something more
- My Own Font version

- PHP & JS Notification system, browser && inside window
- New Messenger / Group Chat / Create room and join with passwords
- Online Game Platform / For All Registered users
- Mentioned By/ Featured On
- Shortcuts for redirect in core.JS file / 🤔
- Context Menu on right click /
- Auto Logout after inactivity /
- Cookies Light/Dark Mode variable

- WebLogin / Advertising page order
- Universal page template
- My YouTube Channel main page with all videos and subscribe link inside /profile/


For all {Inovators, Creators, Dreamers, ...} if you think you can change the world.


404 Page inside apps folder
Apps or Pages folder / .htaccess Rewrite Rule - Remove folder name


sysinfo page / card with logo and some basic information about platform, v4, build etc
Card Application/ Alternative for Apple Card - View Card Balance and some stuff, maybe QR Code on back side. UI Like
Apple Card UI with expenses but with refferals and some info.
Maybe Cryptocurrency will be added! Create offline crypto wallet, add private and public key and try to look into
transactions.
Or make it as one wallet, with investments from people. Card was renamed to folder!
2 Cards with points summary, refferals and crypto BTC, ETH. Discount with partnes/collabs


Blog post page as a reader with customizable colors, font-size and others like iBooks
First video like on YT, elephants big nose XD

Search + News + Friend Requests + Friend List / Tabs?

Studio / You can have many instruments on one page with same alghoritms. All of them in one.
Text Editor, Audio, Video, Post and Photo Filter. It wont have any conflict with others and everything in one place.
Javascript formating image on upload in front-end, php will just control if its really < 2 MB width, height of
image, cut via filter inside Studio Dashboard / PS4 UI + Availaible Apps: Timeline, Messenger, Wallet, Blog,
Spotify, Studio; - if isAdmin(): view applications for controling sys.os-ctl - for each app AdminValidation via
token, id, access type - navbar with notifications ,news, time, and profile picture with href - news and some info
can be appeared as dropdown from app (like ps_store) Timeline / - Create Post with post picture - if Picture is
not set -> Convert text to image
- /p/ post comment show and add

- Post image -> convert to one extension and save as "post_id" . ".jpeg" // One format
Post image will localize only through the post_id
src="../_uploads/user_".$row['token_id']."/posts/".$row['token'].".jpg";


 Auth /
- Check Password strength Weak/Medium/Strong/ExtraStrong if > Medium: Submit = true
- Show Hide Password
- Check if email/nickname is already used JS validation & PHP submit check
- Refferal code submit as token but show as nickname on auth. QR code


 Advertisement /
- Order sys

 CV4S (Commercial)/
- Authorize CV4S Arch (Commercial) via random_str(64)
- CRON send/receive auth and update info/code
- Updates to functions.php or any included special file
- admin sys.ctl page
- Login to Admin via EA API, Secure,
- Search commands
- Javascript synchronize with master
- Contact Page -> Telegram Bot
- Payments Info - > API info
- CV4S USER_LOGIN /
- DB * 'users' info
- generated variabilni symbol

 API /
- base_info function for info about static file, version and logo changing
- .htaccess RewriteEngine on /
- ~/api/
- ~/api/getInfo // Basic Info on default



 .htaccess /
- api.emiraliev.com and other subdomains rewrite
- block access to exact folders from webbrowser




Store /
- Everyone can sell their own services right on platform and get orders/ More Options 4 Store
Balance are not money but a points that can be spent on platform goods/downloads
- WebLogin / T-shirts with Λ L I Ξ V logo, buy/order

Hiring /
- No Admin page! {Submit via send to email or submit modal redirect info + pdf to Telgram/Mail ??? }
-

 Blog,  Video /
 Re:search /



Hester TelegramBot /
- Commands /
- /start
- /help,
- /admin -> identify() -> /statistics,
- /human (talk with human) -> Ask -> Identify User > if(accept) -> Redirect messages to me
- (Maybe import few commands from terminal)
- MySQLi -> JSON answers,
- Insert from cron.php notify() to functions.php -> Get registered user notification or save and make a graphic
chart status per days/months

In The End /
1. Setup Profile
2. Some HTMLCSS&JS Design?

---- BEFORE DEPLOY -----
Deny direct access to a folder and file by htaccess
Root Index URL Redirect automatically to /page/main/ via .htaccess
All Errors redirect .htaccess + inside.sys
robots.txt redirect to .php -> XML program same
RewriteEngine on
RewriteRule ^robots\.txt$ /_inc/xml/robots.php [L]



<span class="done" style="display: none;">
---- DONE ----- ---- DONE ----- ---- DONE ----- ---- DONE ----- ---- DONE ----- ---- DONE ----


 Settings - Profile Setup /
- Update Info + Profile photo

Musthave:

Menu -> Log In / Written in ΛΞV Font
WebLogin /
Control Panel Design
Login Page - if True:
{Rozdeleni mezi admin = 1 or user = 0 - access redirect}
{config file with the same function and variables for all, like main URL etc}
{Menu Will have centered profile card with photo}
- Store + Calendar + Reservation System + Admin (+ blog?)
- News: New feature of website

Musician Studio will have his own landing page with gear, pages and some informations
(maybe with playlist?)

Sys.Security /
- Every form action self.POST action=""
- Prevents scripting attacks by attackers who exploit the code by inserting HTML or Javascript code in the form
fields.

{ auth, db and path.php connection will be as function in functions .php}

SOCIO main page + Pyper messenger + Timeline as menu

if noscript -> Disable /home/ login and redirects {Already cant press Log In Button}
- postCreate -> moved to studio

Profile + Studio + Tabs with exact content Videos/music/blog
Add Bio parameter to DB (edit register page and make it session)
Add to Friends system

Create BASE_URL./home/_api/ || BASE_URL./_api/ --> First Api
_api Create/Test

New Messenger / New Messenger UI + mysqli + Start Chat from profile page

Dashboard /
- Preloader only if dateCreated === today. Only for new users
or set cookie variable via javascript with expire time or deletion

Setup Profile step form process on settings page / Dashboard if(!isset USERNAME && some info && time is today)
Redirect to settings page

Cookies functions in Javascript Set/Check
- RESET PASSWORD page

Apps -> rename to /page/
to ./page/ add app called main, index.html -> .php just redirect to main

Users DB will have token_id paramater
ADMIN ACCESS TYPE = token && id 1
One DB

index{.php, .html} / Rewrite URL via javascript without .htaccess
script and style.css to core.js/css -> Move to _assets

Timeline Search filter query jquery/ajax window with pagination
Each user will have his own folder named by their token_id
users / {token_id} /
- profile
- posts
// Users can delete their pictures via file manager, so they have access to their personal data


---- NONE ----- ---- NONE ----- ---- NONE ----- ---- NONE ----- ---- NONE ----- ---- NONE ----


 Tesco / Scheduler
- key shortcuts / copy, change...
-

Slogans / Marketing
- Hey Ma! Im on billboard
- Fuck the rules
- AM I good enough for you now?
- Im CEO, bitches! / I’m CEO, bitch.
- Better then your Ex
- Hey Zuck! How is your stonks?
- Your mama will be proud


holybyte.org /
- Λ L I Ξ V
- Dreamers
- Hester Robotics (/ Human)
- Semantics
</span>