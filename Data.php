<?php

/**
 * Created by PhpStorm.
 * User: faintedbrain63
 * Date: 10/07/2017
 * Time: 3:03 PM
 */
class Item
{
    public function INSERT_ITEM($nama, $no, $jkerosakan, $kerosakan, $lokasi, $catatan, $jawatan) {
        global $db;

        //Check to see if the voter exists
        $sql = "SELECT *
                FROM item
                WHERE nama = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("s", $nama);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        if($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Sorry the voter you entered already exists in the database.</div>";
        } else {
            //Insert item
            $sql = "INSERT INTO item(nama, no, jkerosakan, kerosakan, lokasi, catatan, jawatan)VALUES(?, ?, ?, ?, ?, ?, ?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;
            } else {
                $stmt->bind_param("sssssss", $nama, $no, $jkerosakan, $kerosakan, $lokasi, $catatan, $jawatan);
            }
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Aduan Berjaya!.</div>";
            }
            $stmt->free_result();
        }
        return $stmt;
    }

    public function READ_ITEM() {
        global $db;

        $sql = "SELECT *
                FROM item
                ORDER BY nama ASC";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }

    public function EDIT_ITEM($item_id) {
        global $db;

        $sql = "SELECT *
                FROM voters
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $item_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }

    public function UPDATE_VOTER($no, $nama, $no_ic, $tarikh_kerosakan, $lokasi, $tarikh_aduan, $status, $tarikh_selesai, $tindakan, $item_id) {
        global $db;

        $sql = "UPDATE item
                SET no = ?, nama = ?, no_ic = ?, tarikh_kerosakan = ? lokasi = ? tarikh_aduan = ? status = ? tarikh_selesai = ? tindakan = ?
                WHERE id = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("ssssi", $no, $nama, $no_ic, $tarikh_kerosakan, $lokasi, $tarikh_aduan, $status, $tarikh_selesai, $tindakan, $item_id);
        }

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Item was updated successfully.<a href='http://localhost/aduan/admin/borangaduan.php'><span class='glyphicon glyphicon-backward'></span></a></div>";
        }
        $stmt->free_result();
        return $stmt;
    }

    public function DELETE_ITEM($item_id) {
        global $db;

        $sql = "DELETE FROM item
                WHERE id = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $voter_id);
        }

        if($stmt->execute()) {
            header("location: http://localhost/aduan/admin/borangaduan.php");
            exit();
        }
        $stmt->free_result();
        return $stmt;
    }
}