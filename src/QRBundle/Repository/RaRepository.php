<?php

namespace QRBundle\Repository;

/**
 * QRRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RaRepository extends \Doctrine\ORM\EntityRepository
{




    public function AjouterRate($id,$idr)
    {


        //////////////////////////////////   111111111 ////////////////////////////////////

        $rawSql1 = "SELECT *FROM rating WHERE  (id=$id and id_reponse=$idr AND rate=0 AND unrate=1)";
        $stm = $this->getEntityManager()->getConnection()->prepare($rawSql1);
        $stm->execute([]);



        $rawSql12 = "SELECT *FROM rating WHERE  (id=$id and id_reponse=$idr AND rate=1 AND unrate=0 )";
        $stm1 = $this->getEntityManager()->getConnection()->prepare($rawSql12);
        $stm1->execute([]);



        $rawSql123= "SELECT *FROM rating WHERE  (id=$id and id_reponse=$idr )";
        $stm2 = $this->getEntityManager()->getConnection()->prepare($rawSql123);
        $stm2->execute([]);



      if(!empty($stm->fetchAll()) )
      {
          $rSql="UPDATE rating set rate=1,unrate=0 WHERE (id=$id and id_reponse=$idr)";

          $this->getEntityManager()->getConnection()->executeUpdate($rSql);

      }





        elseif(!empty($stm1->fetchAll()))
        {
            $rSql11="UPDATE rating set rate=0,unrate=0 WHERE (id=$id and id_reponse=$idr)";

            $this->getEntityManager()->getConnection()->executeUpdate($rSql11);

        }


       else
       {
           $rSql111="INSERT INTO  rating VALUES($id,$idr,1,0)";

           $this->getEntityManager()->getConnection()->executeUpdate($rSql111);

       }








       /* elseif(empty($stm->fetchAll()))
        {
            $rSql111="INSERT INTO  rating VALUES($id,$idr,1,0)";

            $this->getEntityManager()->getConnection()->executeUpdate($rSql111);

        }*/




        $rawSql = "DELETE FROM rating where rate=0 and unrate=0";

        $stmt = $this->getEntityManager()->getConnection()->executeUpdate($rawSql);




      //  echo "<script type='text/javascript'>alert($q);</script>";


       /* if($rawSql1->fetchAll()==null)
        {

          //
            echo "<script type='text/javascript'>alert('No way');</script>";
        }*/
    }


    public function AjouterUnRate($id,$idr)
    {


        //////////////////////////////////   111111111 ////////////////////////////////////

        $rawSql1 = "SELECT *FROM rating WHERE  (id=$id and id_reponse=$idr AND rate=1 AND unrate=0)";
        $stm = $this->getEntityManager()->getConnection()->prepare($rawSql1);
        $stm->execute([]);



        $rawSql12 = "SELECT *FROM rating WHERE  (id=$id and id_reponse=$idr AND rate=0 AND unrate=1 )";
        $stm1 = $this->getEntityManager()->getConnection()->prepare($rawSql12);
        $stm1->execute([]);



        $rawSql123= "SELECT *FROM rating WHERE  (id=$id and id_reponse=$idr )";
        $stm2 = $this->getEntityManager()->getConnection()->prepare($rawSql123);
        $stm2->execute([]);



        if(!empty($stm->fetchAll()) )
        {
            $rSql="UPDATE rating set rate=0,unrate=1 WHERE (id=$id and id_reponse=$idr)";

            $this->getEntityManager()->getConnection()->executeUpdate($rSql);

        }





        elseif(!empty($stm1->fetchAll()))
        {
            $rSql11="UPDATE rating set rate=0,unrate=0 WHERE (id=$id and id_reponse=$idr)";

            $this->getEntityManager()->getConnection()->executeUpdate($rSql11);

        }


        else
        {
            $rSql111="INSERT INTO  rating VALUES($id,$idr,0,1)";

            $this->getEntityManager()->getConnection()->executeUpdate($rSql111);

        }







        $rawSql = "DELETE FROM rating where rate=0 and unrate=0";

        $stmt = $this->getEntityManager()->getConnection()->executeUpdate($rawSql);




    }

}