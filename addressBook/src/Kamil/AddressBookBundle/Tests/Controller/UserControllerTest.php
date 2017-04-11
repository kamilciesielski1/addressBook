<?php

namespace Kamil\AddressBookBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');
    }

    public function testModifyform()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifyForm');
    }

    public function testModifyentity()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifyEntity');
    }

    public function testEntitydelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/entityDelete');
    }

    public function testShowoneentity()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showOneEntity');
    }

    public function testShowallentities()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllEntities');
    }

}
