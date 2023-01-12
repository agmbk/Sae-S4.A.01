<?php

namespace App\Test\Controller;

use App\Entity\Matches;
use App\Repository\MatchesRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MatchesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private MatchesRepository $repository;
    private string $path = '/matches/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Matches::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Match index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'match[domicile_exterieur]' => 'Testing',
            'match[hote]' => 'Testing',
            'match[date_heure]' => 'Testing',
            'match[num_semaine]' => 'Testing',
            'match[num_journee]' => 'Testing',
            'match[gymnase]' => 'Testing',
        ]);

        self::assertResponseRedirects('/matches/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Matches();
        $fixture->setDomicile_exterieur('My Title');
        $fixture->setHote('My Title');
        $fixture->setDate_heure('My Title');
        $fixture->setNum_semaine('My Title');
        $fixture->setNum_journee('My Title');
        $fixture->setGymnase('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Match');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Matches();
        $fixture->setDomicile_exterieur('My Title');
        $fixture->setHote('My Title');
        $fixture->setDate_heure('My Title');
        $fixture->setNum_semaine('My Title');
        $fixture->setNum_journee('My Title');
        $fixture->setGymnase('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'match[domicile_exterieur]' => 'Something New',
            'match[hote]' => 'Something New',
            'match[date_heure]' => 'Something New',
            'match[num_semaine]' => 'Something New',
            'match[num_journee]' => 'Something New',
            'match[gymnase]' => 'Something New',
        ]);

        self::assertResponseRedirects('/matches/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDomicile_exterieur());
        self::assertSame('Something New', $fixture[0]->getHote());
        self::assertSame('Something New', $fixture[0]->getDate_heure());
        self::assertSame('Something New', $fixture[0]->getNum_semaine());
        self::assertSame('Something New', $fixture[0]->getNum_journee());
        self::assertSame('Something New', $fixture[0]->getGymnase());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Matches();
        $fixture->setDomicile_exterieur('My Title');
        $fixture->setHote('My Title');
        $fixture->setDate_heure('My Title');
        $fixture->setNum_semaine('My Title');
        $fixture->setNum_journee('My Title');
        $fixture->setGymnase('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/matches/');
    }
}
