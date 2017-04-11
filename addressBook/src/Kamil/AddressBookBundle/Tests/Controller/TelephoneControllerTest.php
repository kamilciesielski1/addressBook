<?php

namespace Kamil\AddressBookBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TelephoneControllerTest extends WebTestCase
{
    public function testNewtelephonecreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newTelephoneCreate');
    }

    public function testDeletetelephone()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteTelephone');
    }

}
