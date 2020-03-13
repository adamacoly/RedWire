<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Controller\UserController;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 * collectionOperations={
 *         "get",
 *         "post"={
 *                  "security"="is_granted('ROLE_SupAdmin','ROLE_Admin')" ,
 *                              "security_message"="Acces non Autorisé",
 *                  "controller"=UserController::class
 *                }
 *     },
 *     itemOperations={
 *         "get",
 *         "put"={"security"="is_granted('ROLE_SupAdmin','ROLE_Admin') ","security_message"="Acces non Autorisé"},
 *          "delete"
 *     })
 * @ORM\Entity(repositoryClass="App\Repository\UserSysRepository")
 */
class UserSys extends User
{
    
}
