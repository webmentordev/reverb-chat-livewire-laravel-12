## Working Of the chat system
To start the Reverb server, use this following command.
```
$ php artisan reverb:start
```
Automatic Message cleaner Job
```
* * * * * cd /var/www/laravel && php artisan schedule:run >> /dev/null 2>&1
```
Main files tree
```
Home Page
    Chat Livewire Component
        Chatbox Livewire Component
```

## Features
* Login to send messages in the chat
* Popup chat by clicking the Icon
* Show authenticated user's name in the chat container
* Auto Scroll to the bottom when message has been recieved
* No auto scrolling to the bottom when you have scrolled up
* Show message, name of the sender & time, Asia/Karachi timezone
* Press Enter to send the message
* No Multiline Input (yet)
* Message sound on receiving new message
* Send Image, automatically store in the Public Folder to be accessible
* Auto delete 1 day old messages along with images uploaded with the message
