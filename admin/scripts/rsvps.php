<?php

function addRSVP($name, $child, $jumping, $socks, $contact, $cat)
{
    try {
        include 'connect.php';


        $insert_rsvp_query = 'INSERT INTO tbl_rsvp(rsvp_name, rsvp_child, rsvp_jumping, rsvp_socks, rsvp_contact)';
        $insert_rsvp_query .= ' VALUES(:name, :child, :jumping, :socks, :contact)';
        $insert_rsvp   = $pdo->prepare($insert_rsvp_query);
        $insert_result = $insert_rsvp->execute(
            array(
                
                ':name'      => $name,
                ':child'      => $child,
                ':jumping'     => $jumping,
                ':socks'     => $socks,
                ':contact'     => $contact

            )
        );

        if (!$insert_result) {
            throw new Exception('Failed to insert');
        }

        $last_id = $pdo->lastInsertId();
        $insert_cat_query = 'INSERT INTO tbl_rsvp_category (rsvp_id, cat_id) VALUES ("' . $last_id . '", :cat_id)';
        $insert_cat       = $pdo->prepare($insert_cat_query);
        $insert_cat->execute(
            array(
                ':cat_id'  => $cat,
            )
        );

        header("Location: thankyou.html");
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}
