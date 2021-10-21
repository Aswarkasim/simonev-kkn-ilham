<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  function listBerita()
  {
    $this->db->select('tbl_berita.*,
                            tbl_kategori.nama_kategori')
      ->from('tbl_berita')
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kategori.id_kategori', 'LEFT');
    return $this->db->get()->result();
  }

  function detailBerita($slug)
  {
    $this->db->select('tbl_berita.*,
                            tbl_kategori.nama_kategori')
      ->from('tbl_berita')
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kategori.id_kategori', 'LEFT')
      ->where('tbl_berita.slug', $slug);
    return $this->db->get();
  }


  function listSaran()
  {
    $this->db->select('tbl_saran.*,
                            tbl_user.namalengkap')
      ->from('tbl_saran')
      ->join('tbl_user', 'tbl_user.id_user = tbl_saran.id_user', 'LEFT')
      ->order_by('date_created', 'DESC');
    // ->where('');
    return $this->db->get()->result();
  }

  function nilaiList($id_angkatan, $dinilai)
  {
    $this->db->select('tbl_penilaian.*,
                            tbl_user.namalengkap,
                            tbl_lokasi.nama_lokasi,
                            ')
      ->from('tbl_penilaian')
      ->join('tbl_user', 'tbl_user.id_user = tbl_penilaian.id_user', 'LEFT')
      ->join('tbl_lokasi', 'tbl_lokasi.id_lokasi = tbl_penilaian.id_lokasi', 'LEFT')
      ->where('dinilai', $dinilai)
      ->where('tbl_penilaian.id_angkatan', $id_angkatan)
      ->order_by('date_created', 'DESC');
    return $this->db->get()->result();
  }

  function listPengajuan()
  {
    $this->db->select('tbl_pengajuan.*,
                            tbl_user.namalengkap,
                            tbl_lokasi.nama_lokasi as nama_lokasi_tujuan')
      ->from('tbl_pengajuan')
      ->join('tbl_user', 'tbl_user.id_user = tbl_pengajuan.id_user', 'LEFT')
      ->join('tbl_lokasi', 'tbl_lokasi.id_lokasi = tbl_pengajuan.id_lokasi_tujuan', 'LEFT')
      ->order_by('date_created', 'DESC');
    // ->where('');
    return $this->db->get()->result();
  }

  function userToLokasi($id_user)
  {
    $this->db->select('tbl_user.*,
                            tbl_lokasi.nama_lokasi')
      ->from('tbl_user')
      ->join('tbl_lokasi', 'tbl_lokasi.id_lokasi = tbl_user.id_lokasi', 'LEFT')
      ->where('id_user', $id_user);
    return $this->db->get()->row();
  }

  function listMhsAngkatan($id_angkatan)
  {
    $this->db->select('*')
      ->from('tbl_user')
      ->where('role', 'mahasiswa')
      ->where('id_lokasi', null)
      ->where('id_angkatan', $id_angkatan);
    return $this->db->get()->result();
  }

  function listMhsLokasi($id_angkatan, $id_lokasi)
  {
    $this->db->select('*')
      ->from('tbl_user')
      ->where('role', 'mahasiswa')
      ->where('id_angkatan', $id_angkatan)
      ->where('id_lokasi', $id_lokasi);
    return $this->db->get()->result();
  }



  function listProkerLokasi($id_angkatan, $id_lokasi)
  {
    $this->db->select('*')
      ->from('tbl_proker')
      ->where('id_angkatan', $id_angkatan)
      ->where('id_lokasi', $id_lokasi);
    return $this->db->get()->result();
  }

  function listDplLokasi($id_angkatan, $id_dpl)
  {
    $this->db->select('*')
      ->from('tbl_lokasi')
      ->where('id_angkatan', $id_angkatan)
      ->where('id_dpl', $id_dpl);
    return $this->db->get()->result();
  }

  function cekPengajuan($id_user, $id_lokasi)
  {
    $this->db->select('*')
      ->from('tbl_pengajuan')
      ->where('id_user', $id_user)
      ->where('id_lokasi_awal', $id_lokasi);
    return $this->db->get()->row();
  }

  function cekLaporan($id_user, $id_lokasi)
  {
    $this->db->select('*')
      ->from('tbl_laporan')
      ->where('id_user', $id_user)
      ->where('id_lokasi', $id_lokasi);
    return $this->db->get()->row();
  }

  function penilaianListMhs($id_user)
  {
    $this->db->select('tbl_penilaian.*,
                            tbl_lokasi.nama_lokasi')
      ->from('tbl_penilaian')
      ->join('tbl_lokasi', 'tbl_lokasi.id_lokasi = tbl_penilaian.id_lokasi', 'LEFT')
      ->where('id_user', $id_user);
    return $this->db->get()->row();
  }
}
