<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 28/04/2018
 * Time: 11:20
 */

namespace CoreBundle\Service;


class ServiceCallOfOffer
{
    private $em;

    public function acceptProposition($idProp, $comment)
    {
        $prop = $this->em
            ->getRepository('CoreBundle:Proposition')
            ->find($idProp);
        $prop->setIsRefused(false);
        $prop->setIsAccepted(true);
        $prop->setResponseViwametal($comment);
        $this->em->flush();

        return $prop;
    }

    public function refuseProposition($idProp, $comment)
    {
        $prop = $this->em
            ->getRepository('CoreBundle:Proposition')
            ->find($idProp);
        $prop->setIsRefused(true);
        $prop->setIsAccepted(false);
        $prop->setResponseViwametal($comment);
        $this->em->flush();

        return $prop;
    }

    public function getCooTagFromPropositionId($idProp)
    {
        $rep = $this->em
            ->getRepository('CoreBundle:Proposition');
        $tag = $rep->getCooTagByPropositionId($idProp);
        return $tag;
    }

    public function getCooProviderUsernameFromPropositionId($idProp)
    {
        $rep = $this->em
            ->getRepository('CoreBundle:Proposition');
        $name = $rep->getCooProviderUsernameByPropositionId($idProp);
        return $name;
    }

    public function getCooFromPropositionId($idProp)
    {
        $rep = $this->em
            ->getRepository('CoreBundle:Proposition');
        $name = $rep->getCooByPropositionId($idProp);
        return $name;
    }


    public function __construct($doctrine)
    {
        $this->em = $doctrine->getManager();
    }
}