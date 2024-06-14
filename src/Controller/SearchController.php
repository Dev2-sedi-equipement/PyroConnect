<?php

namespace App\Controller;
use App\Repository\ClientsRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    // #[Route('/search', name: 'app_search')]
    // public function index(): Response
    // {
    //     return $this->render('search/index.html.twig', [
    //         'controller_name' => 'SearchController',
    //     ]);
    // }


    private Security $security;

    public function __construct(Security $security)
    {
    
        $this->security = $security;


    }

    #[Route("/searchClient", name: "search_clients")]
    public function searchClients(Request $request, ClientsRepository $clientRepository, Security $security):JsonResponse
    {
        $searchTerm = $request->query->get('search_term');
        $codeVrp= $security->getUser()->getCodeVrp();
        // dd($security->getUser()->getId());  
        $results = $clientRepository->searchClients($searchTerm,$codeVrp);
        $resultArray = [];
        foreach ($results as $result) {
            $resultArray[] = [
                'id' => $result->getId(),
                'nom' => $result->getNom(),
                "codeDpt"=>$result->getCodeDpt(),
                'codeInsee' => $result->getCodeInsee(),        
                'ville' => $result->getVille(),        

            ];
        }
    
       
        // Suppose que $results est déjà un tableau associatif ou un objet JSON
        return new JsonResponse($resultArray);
    }


    #[Route("/searchVille", name: "search_ville")]
    public function searchVille(Request $request, ClientsRepository $clientRepository):JsonResponse
    {
        $codeVrp= $this->security->getUser()->getCodeVrp();
        $searchTerm = $request->query->get('search_term');
        $results = $clientRepository->searchVille($searchTerm,$codeVrp);
        $resultArray = [];
        foreach ($results as $result) {
            $resultArray[] = [
                'id' => $result->getId(),
                'nom' => $result->getNom(),
                "codeDpt"=>$result->getCodeDpt(),
                'codeInsee' => $result->getCodeInsee(),
                'ville' => $result->getVille(),   
                'userId'=> $result->getIdUser(),

            ];
        }
    
       
        // Suppose que $results est déjà un tableau associatif ou un objet JSON
        return new JsonResponse($resultArray);
    }
    #[Route("/searchC0", name: "search_c0")]
    public function searchC0(Request $request, ClientsRepository $clientRepository):JsonResponse
    {
        $codeVrp= $this->security->getUser()->getCodeVrp();
        $searchTerm = $request->query->get('search_term');
        $results = $clientRepository->searchC0($searchTerm,$codeVrp);
        $resultArray = [];
        foreach ($results as $result) {
            $resultArray[] = [
                'id' => $result->getId(),
                'nom' => $result->getNom(),
                "codeDpt"=>$result->getCodeDpt(),
                'codeInsee' => $result->getCodeInsee(),
                'ville' => $result->getVille(),    
                'userId'=> $result->getIdUser(),

            ];
        }
    
       
        // Suppose que $results est déjà un tableau associatif ou un objet JSON
        return new JsonResponse($resultArray);
    }

    #[Route("/searchDpt", name: "search_Dpt")]
    public function searchDpt(Request $request, ClientsRepository $clientRepository):JsonResponse
    {
        $searchTerm = $request->query->get('search_term');
        $results = $clientRepository->searchDpt($searchTerm);
        $resultArray = [];
        foreach ($results as $result) {
            $resultArray[] = [
                'id' => $result->getId(),
                'nom' => $result->getNom(),
                "codeDpt"=>$result->getCodeDpt(),
                'codeInsee' => $result->getCodeInsee(),
                

        
            ];
        }
    
       
        // Suppose que $results est déjà un tableau associatif ou un objet JSON
        return new JsonResponse($resultArray);
    }

    #[Route("/findOnlythree", name: "findOnlythree")]
    public function findOnlythree(ClientsRepository $clientRepository, CacheInterface $cache): Response
    {
        // Utilisation d'un cache avec une clé spécifique
        // $results = $cache->get('find_only_three_results', function ($item) use ($clientRepository) {
            $codeVrp= $this->security->getUser()->getCodeVrp();
            // Si les données ne sont pas déjà en cache, exécutez la requête et mettez les résultats en cache pendant une heure
            // $item->expiresAfter(3600); // Cache expirant après une heure
    
            $results = $clientRepository->maxResult($codeVrp);
            $resultArray = [];
            foreach ($results as $result) {
                $resultArray[] = [
                    'id' => $result->getId(),
                    'nom' => $result->getNom(),
                    'codeDpt' => $result->getCodeDpt(),
                    'codeInsee' => $result->getCodeInsee(),
                    'codeVrp' => $result->getCodeVrp(),
                    'ville' => $result->getVille(),    
                    'userId'=> $result->getIdUser(),




                ];
            }
            // return $resultArray;
        // });
    
        // Convertir les résultats en JSON et les renvoyer en tant que réponse
        return new JsonResponse($resultArray);
    }

    #[Route("/searchClientSf", name: "search_clients_sf")]
    public function searchClientsSf(Request $request, ClientsRepository $clientRepository):JsonResponse
    {
        $searchTerm = $request->query->get('search_term');
        $results = $clientRepository->searchClientsSf($searchTerm);
        $resultArray = [];
        foreach ($results as $result) {
            $resultArray[] = [
                'id' => $result->getId(),
                'nom' => $result->getNom(),
                "codeDpt"=>$result->getCodeDpt(),
                'codeInsee' => $result->getCodeInsee(),     
                'codeVrp'=> $result->getCodeVrp(),
                'userId'=> $result->getIdUser(),
                'ville' => $result->getVille(),        



            ];
        }
    
       
        // Suppose que $results est déjà un tableau associatif ou un objet JSON
        return new JsonResponse($resultArray);
    }

    #[Route("/searchVilleSf", name: "search_ville_sf")]
    public function searchVilleSf(Request $request, ClientsRepository $clientRepository):JsonResponse
    {
        $searchTerm = $request->query->get('search_term');
        $results = $clientRepository->searchVilleSf($searchTerm);
        $resultArray = [];
        foreach ($results as $result) {
            $resultArray[] = [
                'id' => $result->getId(),
                'nom' => $result->getNom(),
                "codeDpt"=>$result->getCodeDpt(),
                'codeInsee' => $result->getCodeInsee(),
                'codeVrp'=> $result->getCodeVrp(),
                'userId'=> $result->getIdUser(),
                'ville' => $result->getVille(),        




        
            ];
        }
    
       
        // Suppose que $results est déjà un tableau associatif ou un objet JSON
        return new JsonResponse($resultArray);
    }
    #[Route("/searchC0Sf", name: "search_c0_sf")]
    public function searchC0Sf(Request $request, ClientsRepository $clientRepository):JsonResponse
    {
        $searchTerm = $request->query->get('search_term');
        $results = $clientRepository->searchC0Sf($searchTerm);
        $resultArray = [];
        foreach ($results as $result) {
            $resultArray[] = [
                'id' => $result->getId(),
                'nom' => $result->getNom(),
                "codeDpt"=>$result->getCodeDpt(),
                'codeInsee' => $result->getCodeInsee(),
                'codeVrp'=> $result->getCodeVrp(),
                'userId'=> $result->getIdUser(),
                'ville' => $result->getVille(),        




        
            ];
        }
    
       
        // Suppose que $results est déjà un tableau associatif ou un objet JSON
        return new JsonResponse($resultArray);
    }

    #[Route("/find20ResultSf", name: "find_Result_sf")]
    public function find20ResultSF(ClientsRepository $clientRepository, CacheInterface $cache): Response
    {
        // Utilisation d'un cache avec une clé spécifique
        $results = $cache->get('find_only_three_results', function ($item) use ($clientRepository) {
            // Si les données ne sont pas déjà en cache, exécutez la requête et mettez les résultats en cache pendant une heure
            $item->expiresAfter(3600); // Cache expirant après une heure
    
            $results = $clientRepository->maxResultSf();
            $resultArray = [];
            foreach ($results as $result) {
                $resultArray[] = [
                    'id' => $result->getId(),
                    'nom' => $result->getNom(),
                    'codeDpt' => $result->getCodeDpt(),
                    'codeInsee' => $result->getCodeInsee(),
                    'codeVrp'=> $result->getCodeVrp(),
                    'userId'=> $result->getIdUser(),
                    'ville' => $result->getVille(),        



                ];
            }
            return $resultArray;
        });
    
        // Convertir les résultats en JSON et les renvoyer en tant que réponse
        return new JsonResponse($results);
    }
}
