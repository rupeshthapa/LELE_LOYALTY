<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Repository\AboutRepository;
use App\Repository\FeatureRepository;
use App\Repository\LoyaltyRepository;
use App\Repository\OfficeRepository;
use App\Repository\ProjectRepository;
use App\Repository\ReasonRepository;
use App\Repository\SectorRepository;
use App\Repository\WorkflowRepository;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected AboutRepository $aboutRepo;
    protected ProjectRepository $projectRepo;

    protected LoyaltyRepository $loyaltyRepo;

    protected SectorRepository $sectorRepo;

    protected ReasonRepository $reasonRepo;

    protected WorkflowRepository $workflowRepo;

    protected FeatureRepository $featureRepo;

    protected OfficeRepository $officeRepo;


    public function __construct(AboutRepository $aboutRepo,  ProjectRepository $projectRepo, LoyaltyRepository $loyaltyRepo, 
    SectorRepository $sectorRepo, ReasonRepository $reasonRepo, 
    WorkflowRepository $workflowRepo, FeatureRepository $featureRepo, 
    OfficeRepository $officeRepo){
        $this->aboutRepo = $aboutRepo;
        $this->projectRepo = $projectRepo;
        $this->loyaltyRepo = $loyaltyRepo;
        $this->sectorRepo = $sectorRepo;
        $this->reasonRepo = $reasonRepo;
        $this->workflowRepo = $workflowRepo;
        $this->featureRepo = $featureRepo;
        $this->officeRepo = $officeRepo;

    }
  public function main(){
    $abouts = $this->aboutRepo->getAll();
    $projects = $this->projectRepo->getAll();
    $loyalties = $this->loyaltyRepo->getAll();
    $sectors = $this->sectorRepo->getAll();
    $reasons = $this->reasonRepo->getAll();
    $workflows = $this->workflowRepo->getAll();
    $features = $this->featureRepo->getAll();
    $offices = $this->officeRepo->getAll();

    return view('main', compact('abouts', 'projects', 'loyalties', 'sectors', 'reasons', 'workflows', 'features', 'offices'));
}

}
