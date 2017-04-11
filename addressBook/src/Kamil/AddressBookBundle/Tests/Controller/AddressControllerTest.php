<?php

namespace Kamil\AddressBookBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddressControllerTest extends WebTestCase
{
    public function testNewaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newAddress');
    }

    public function testModifyaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifyAddress');
    }

    public function testDeleteaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteAddress');
    }

    public function testShowaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAddress');
    }

    public function testShowalladdresses()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllAddresses');
    }

}
