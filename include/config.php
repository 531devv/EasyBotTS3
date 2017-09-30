<?php
/**
 * Created by PhpStorm.
 * User: 531
 * Date: 2017-08-21
 * Time: 20:23
 */

return array(
    'ts3' => array(
        'ip' => 'localhost',
        'query_port' => '10011',
        'port' => '9987',
        'server_name' => 'BigGames.pro | Nowa Jakość Komunikacji'
    ),
    'instance' => array(
        'command_bot' => array(
            'user' => 'bot1',
            'password' => pass
            'name' => 'Easy_CommandBot',
            'channel_id' => '74'

        ),
        'event_bot' => array(
            'user' => 'bot2',
            'password' => 'pass',
            'name' => 'Easy_EventBot',
            'channel_id' => '74',
            'functions' => array(
                'setRecordOnline' => array(
                    'enabled' => true,
                    'channel_name' => '[cspacer30]▪ Rekord online: %U ▪',
                    'interval' => '30',
                    'channel_id' => '46'
                ),
                'setUsersOnline' => array(
                    'enabled' => true,
                    'channel_name' => '[Online: %U]',
                    'interval' => '30'
                ),
                'pokeAdmin' => array(
                    'enabled' => true,
                    'admin_afk_groups' => array('123'),
                    'admin_groups_id' => array('70', '69', '68', '67', '66', '65', '65', '6'),
                    'channel_id' => '81'
                ),
                'setDateOnChannel' => array(
                    'enabled' => true,
                    'channel_id' => '107',
                    'channel_name' => '[cspacer]▪ Godzina: %D ▪',
                    'interval' => '1'
                ),
                'welcomeMsg' => array(
                    'enabled' => true,
                    'messages' => array(
                        '[I] Witaj,[/i] [B][COLOR=#ff0000]%NICKNAME%[/COLOR][/B] [I]na[/I] [B]BigGames.pro[/B]',
                        '[B][I][COLOR=#ff007f]Informację o Tobie[/COLOR]:[/I][/B]',
                        '[I]Ostatnie logowanie:[/I] [B]%LAST_LOGIN%.[/B]',
                        '[I]Pierwsze Połączenie[/I]: [B]%FIRST_CONNECT%[/B]',
                        '[I]Unique ID:[/I] [B]%UID%[/B]',
                        '[I]Adres IP:[/I] [B]%IP%[/B] (%COUNTRY%)',
                        '[I]Twoje najdłuższe połączenie[/I]: [B]x[/B] [I]godzin,[/I] [B]xx[/B] [I]minut,[/I] [B]xx[/B] [I]sekund.[/I]',
                        '[I]Łącznie spędziłeś(aś) na serwerze:[/I] [B]x[/B] [I]godzin,[/I] [B]x[/B] [I]minut,[/I] [B]x[/B] [I]sekund w tym[/I] [B]x%[/B] [I]online.[/I]',
                        '[I]Aktualnie jest:[/I] [B]xx / xx[/B] ([B]xx.xx%[/B]) [I]online osób na[/I] xx [I]kanałach.[/I]',
                        '[I] Przydatne linki:[/I] [B][url=ts3server://biggames.pro?addbookmark=BigGames.pro | Nowa Jakość Komunikacji] Dodaj do zakładek [/url], [url=https://www.facebook.com/BigGames.pro] Polub nas na Facebook [/url], [url=http://biggames.pro/] Odwiedź naszą strone [/url][/B]'
                    )
                )
            )
        )
    )
);
