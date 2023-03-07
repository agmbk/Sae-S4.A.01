<?php

namespace App\Test\Controller;

use App\Entity\Equipes;
use App\Repository\EquipesRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EquipesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EquipesRepository $repository;
    private string $path = '/equipes/';

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Equipe index');

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
            'equipe[libelle]' => 'Testing',
            'equipe[entraineur]' => 'Testing',
            'equipe[creneaux]' => 'Testing',
            'equipe[url_photo]' => 'Testing',
            'equipe[url_result_calendrier]' => 'Testing',
            'equipe[commentaire]' => 'Testing',
        ]);

        self::assertResponseRedirects('/equipes/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Equipes();
        $fixture->setLibelle('My Title');
        $fixture->setEntraineur('My Title');
        $fixture->setCreneaux('My Title');
        $fixture->setUrl_photo('My Title');
        $fixture->setUrl_result_calendrier('My Title');
        $fixture->setCommentaire('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Equipe');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Equipes();
        $fixture->setLibelle('My Title');
        $fixture->setEntraineur('My Title');
        $fixture->setCreneaux('My Title');
        $fixture->setUrl_photo('My Title');
        $fixture->setUrl_result_calendrier('My Title');
        $fixture->setCommentaire('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'equipe[libelle]' => 'Something New',
            'equipe[entraineur]' => 'Something New',
            'equipe[creneaux]' => 'Something New',
            'equipe[url_photo]' => 'Something New',
            'equipe[url_result_calendrier]' => 'Something New',
            'equipe[commentaire]' => 'Something New',
        ]);

        self::assertResponseRedirects('/equipes/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getLibelle());
        self::assertSame('Something New', $fixture[0]->getEntraineur());
        self::assertSame('Something New', $fixture[0]->getCreneaux());
        self::assertSame('Something New', $fixture[0]->getUrl_photo());
        self::assertSame('Something New', $fixture[0]->getUrl_result_calendrier());
        self::assertSame('Something New', $fixture[0]->getCommentaire());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Equipes();
        $fixture->setLibelle('My Title');
        $fixture->setEntraineur('My Title');
        $fixture->setCreneaux('My Title');
        $fixture->setUrl_photo('My Title');
        $fixture->setUrl_result_calendrier('My Title');
        $fixture->setCommentaire('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/equipes/');
    }

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Equipes::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }
}
