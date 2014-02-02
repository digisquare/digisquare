Opauth-Meetup
=============
[Opauth][1] strategy for Meetup authentication.

Implemented based on http://www.meetup.com/meetup_api/auth/#oauth2 using OAuth2.

Opauth is a multi-provider authentication framework for PHP.

Demo: http://opauth.org/#meetup

Getting started
----------------
1. Install Opauth-Meetup:
   ```bash
   cd path_to_opauth/Strategy
   git clone git://github.com/damusnet/opauth-meetup.git Meetup
   ```

2. Register a Meetup application at https://secure.meetup.com/meetup_api/oauth_consumers/create
   
3. Configure Opauth-Meetup strategy with `key` and `secret`.

4. Direct user to `http://path_to_opauth/meetup` to authenticate


Strategy configuration
----------------------

Required parameters:

```php
<?php
'Meetup' => array(
	'key' => 'YOUR CLIENT KEY',
	'secret' => 'YOUR CLIENT SECRET'
)
```

License
---------
Opauth-Meetup is MIT Licensed  
Copyright © 2014 Damien Varron (http://www.effervea.com)

[1]: https://github.com/opauth/opauth