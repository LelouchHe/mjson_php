
## story

I used a plugin of FF(jsonshow by one of my colleague) to format json output to debug web service.

one day, I got transfered to some place with only FF3.6 installed, no permisson to update anything and

no VPN access to inner web of my company.

I was upset, since I got a lot of debug to do with json these days.

I don't like the online json format services, they're slow or wrong

so, here is my simple formated json output service.

## simple

it's so simple that I'm embrassed to introduce this. it's just some simple functions in php, and provided for

those poor guys with the same problem.

notice that php 5.4 or newer provide a option in `json_encode`: **JSON_PRETTY_PRINT**[see here][json_encode]

actually I don't know its effect.

if you has php 5.4 or newer, you might want to try that before useing mine

[json_encode]: http://php.net/manual/en/function.json-encode.php

## usage

only thing you need to do is to include m_json.php, then you could use `m_json_encode` to format json output

parameter is php array you like to output
