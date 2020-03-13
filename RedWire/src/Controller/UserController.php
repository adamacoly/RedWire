<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserSys;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class UserController
{
    private $userPasswordEncoder;
    private $request;
    private $useactuel;
    private $token;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder,TokenStorageInterface $token)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->token = $token;
        $this->useactuel =$this->token->getToken()->getUser();

    }

    public function __invoke(UserSys $data): UserSys
    {

        if ($this->useactuel instanceof UserSys){
            
            $verifationSup_Admin= in_array("ROLE_SupAdmin", $this->useactuel->getRoles());
            $verifationAdmin= in_array("ROLE_Admin", $this->useactuel->getRoles()) && ($data->getRoles()=="ROLE_Caissier");
            if($verifationSup_Admin||$verifationAdmin){ 
                $data->setPassword(
                    $this->userPasswordEncoder->encodePassword($data, $data->getPassword())
                )
                ->setRoles(["ROLE_".$data->getProfil()->getLibelle()]);  
                return $data;
            }

            else{
                return new JsonResponse("Vous n'avez pas ce droit");
            }
      
        }

        
    }
}