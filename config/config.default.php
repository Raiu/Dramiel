<?php

return [

    'discord' => [
        'token' => 'YOUR_TOKEN_KEY',
    ],

    'bot' => [
         //enter the token for your app (https://discordapp.com/developers/applications/me)
        'name' => 'TWINKIE NUMBA UN', // Discord name for your bot (Not yet implemented)
        'game' => 'on my drums', // Shows the bot "playing" this
        'trigger' => '!', // what trigger is used for commands
        'guild' => 152677265635803136, // guildID
        'adminRoles' => ['Admin', ''], //enter the roles that you'd like to have access to admin commands
        'restrictedChannels' => [0,0], //bot will not respond in these channels
        'silentMode' => 'false'//set this to true if you want to disable all the chat commands
    ],

    'database' => [
        'host' => 'localhost',
        'user' => 'user',
        'pass' => 'password',
        'database' => 'database',
        'prefix' => ''
    ],

    'enabledPlugins' => [
        'about', //info on the bot
        //'auth', //sso based auth system
        //'authCheck', // checks if users have left corp or alliance
        'charInfo', // eve character info using eve-kill
        'corpInfo', // eve corp info
        'eveStatus', // tq status message command
        //"periodicStatusCheck", // ....YOU MUST SET A CHANNEL IN THE NOTIFICATIONS SECTION NEAR THE BOTTOM OF THIS FILE.... Bot routinely checks if TQ status changes (reports server downtimes to the notifications channel)
        'help', // bot help program, will list active addons
        //'price', // price check tool, works for all items and ships. Can either !pc <itemname> for general, or !<systemname> <item> for more specific
        //'time', // global clock with eve time
        //"evemails", // evemail updater, will post corp and alliance mails to a channel.
        //"fileReader", // Read advanced plugin config section of the wiki
        //"notifications", // eve notifications to a channel, good for warning users of an attack
        //"twitterOutput", // twitter input to stay up to date on eve happenings
        //'getKillmails', // show corp killmails in a chat channel
        //'getKillmailsRedis', // beta redisQ based killmail pulling USE AT OWN RISK (DO NOT USE WITH getKillmails also active)
        //"siphons", // report possible siphons, see wiki for more info
        //"siloFull", // report any silos nearing max capacity. Currently only works for silo bonus (amarr) towers
        //"fleetUpOperations", // integrate with fleet up and post any new operations and then ping them when they get close
        //"fleetUpOps", //show upcoming fleet up operations with a message command
        //"rssReader", //Post news to rss feeds
    ],
];