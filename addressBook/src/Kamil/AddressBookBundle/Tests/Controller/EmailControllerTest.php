<?php

namespace Kamil\AddressBookBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EmailControllerTest extends WebTestCase
{
    public function testNewemailcreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newEmailCreate');
    }

    public function testDeleteemail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteEmail');
    }

}
