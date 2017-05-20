<script type="text/javascript">
$(document).ready(function(){

	var base_url = '<?=base_url()?>';

	$('.t').dataTable();

	$('[data-toggle="tooltip"]').tooltip(); 

	$(document).on('click', '#view_modal', function(e){
		e.preventDefault();
		$('#modal_admin').modal();
		$('#aksi_admin').val('tambah');
	});

	$(document).on('submit', '#form_admin', function(e){
		e.preventDefault();
		$('#notif_admin').html('Loading...');
		var data = $('#form_admin').serialize();
		var aksi = $('#aksi_admin').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_admin/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_admin').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_admin').serialize();
	        $('#notif_admin').html('Loading..');
		    $.ajax({
		        url: base_url+'a_admin/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_admin').html(msg);
		        }
		    }); 
		}
		
	});
	
	$(document).on('click', '.hapus_admin', function(e){
		e.preventDefault();
		$('#modal_hapus_admin').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_admin', function(e){
	        e.preventDefault();
	        $('#notif_hapus_admin').html('Loading..');
	        $.ajax({
	          url: base_url+'a_admin/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_admin').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_admin', function(){
	      $('#modal_admin').modal();
	      $('#aksi_admin').val('edit');
	      $('#username').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#username').val(id);

	      $.ajax({
	        url: base_url+'a_admin/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          $('#nama').val(data.nama);
	          //$('#password').val(data.password);
	          $('#level').val(data.level);
	        }
	      });
	  });

	/*kelas*/
	function bersih_kelas(){
		$('#kelas').val('');
	    $('#ket_kelas').val('');
	};
	$(document).on('click', '#view_modal_kelas', function(e){
		e.preventDefault();
		$('#modal_kelas').modal();
		$('#aksi_kelas').val('tambah');
		bersih_kelas()
	});

	$(document).on('submit', '#form_kelas', function(e){
		e.preventDefault();
		$('#notif_kelas').html('Loading...');
		var data = $('#form_kelas').serialize();
		var aksi = $('#aksi_kelas').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_kelas/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_kelas').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_kelas').serialize();
	        $('#notif_kelas').html('Loading..');
		    $.ajax({
		        url: base_url+'a_kelas/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_kelas').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_kelas', function(e){
		e.preventDefault();
		$('#modal_hapus_kelas').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_kelas', function(e){
	        e.preventDefault();
	        $('#notif_hapus_kelas').html('Loading..');
	        $.ajax({
	          url: base_url+'a_kelas/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_kelas').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_kelas', function(e){
		e.preventDefault();
	      $('#modal_kelas').modal();
	      $('#aksi_kelas').val('edit');
	      //$('#username').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#id_kelas').val(id);

	      $.ajax({
	        url: base_url+'a_kelas/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          $('#kelas').val(data.nama_kelas);
	          //$('#password').val(data.password);
	          $('#ket_kelas').val(data.keterangan);
	        }
	      });
	  });

	/*end kelas*/

	/* dosen */
	$(document).on('click', '#view_modal_dosen', function(e){
		e.preventDefault();
		$('#modal_dosen').modal();
		$('#aksi_dosen').val('tambah');
		bersih_kelas()
	});

	$(document).on('submit', '#form_dosen', function(e){
		e.preventDefault();
		$('#notif_dosen').html('Loading...');
		var data = $('#form_dosen').serialize();
		var aksi = $('#aksi_dosen').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_dosen/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_dosen').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_dosen').serialize();
	        $('#notif_dosen').html('Loading..');
		    $.ajax({
		        url: base_url+'a_dosen/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_dosen').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_dosen', function(e){
		e.preventDefault();
		$('#modal_hapus_dosen').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_dosen', function(e){
	        e.preventDefault();
	        $('#notif_hapus_dosen').html('Loading..');
	        $.ajax({
	          url: base_url+'a_dosen/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_dosen').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_dosen', function(e){
		e.preventDefault();
	      $('#modal_dosen').modal();
	      $('#aksi_dosen').val('edit');
	      $('#no_reg_dosen').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#no_reg_dosen').val(id);

	      $.ajax({
	        url: base_url+'a_dosen/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          $('#no_reg_dosen').val(data.no_dosen);
	          //$('#password').val(data.password);
	          $('#nama_dosen').val(data.nama_dosen);
	          $('#tempat_lahir_dosen').val(data.tempat_lahir);
	          $('#tanggal_lahir_dosen').val(data.tanggal_lahir);
	          $('#no_hp_dosen').val(data.no_hp);
	          $('#jenis_kelamin_dosen').val(data.jenis_kelamin);
	          $('#agama_dosen').val(data.agama);
	          $('#alamat_dosen').val(data.alamat);
	        }
	      });
	  });
	/*end dosen */

	/*matakuliah*/
	$(document).on('click', '#view_modal_matakuliah', function(e){
		e.preventDefault();
		$('#modal_matakuliah').modal();
		$('#aksi_mk').val('tambah');
		//bersih_kelas()
	});

	$(document).on('submit', '#form_matakuliah', function(e){
		e.preventDefault();
		$('#notif_matakuliah').html('Loading...');
		var data = $('#form_matakuliah').serialize();
		var aksi = $('#aksi_mk').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_matakuliah/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_matakuliah').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_matakuliah').serialize();
	        $('#notif_matakuliah').html('Loading..');
		    $.ajax({
		        url: base_url+'a_matakuliah/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_matakuliah').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_mk', function(e){
		e.preventDefault();
		$('#modal_hapus_mk').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_mk', function(e){
	        e.preventDefault();
	        $('#notif_hapus_mk').html('Loading..');
	        $.ajax({
	          url: base_url+'a_matakuliah/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_mk').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_mk', function(e){
		e.preventDefault();
	      $('#modal_matakuliah').modal();
	      $('#aksi_mk').val('edit');
	      //$('#no_reg_dosen').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#id_mk').val(id);

	      $.ajax({
	        url: base_url+'a_matakuliah/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          $('#kode_mk').val(data.kode_mk);
	          //$('#password').val(data.password);
	          $('#nama_mk').val(data.nama_mk);
	          $('#sks').val(data.sks);
	          $('#ket_mk').val(data.keterangan);
	        }
	      });
	  });
	/*end matakuliah*/

	/*mahasiswa*/
	$(document).on('click', '#view_modal_mhs', function(e){
		e.preventDefault();
		$('#modal_mhs').modal();
		$('#aksi_mhs').val('tambah');
		//bersih_kelas()
	});

	$(document).on('submit', '#form_mhs', function(e){
		e.preventDefault();
		$('#notif_mhs').html('Loading...');
		var data = $('#form_mhs').serialize();
		var aksi = $('#aksi_mhs').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_mahasiswa/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_mhs').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_mhs').serialize();
	        $('#notif_mhs').html('Loading..');
		    $.ajax({
		        url: base_url+'a_mahasiswa/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_mhs').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_mhs', function(e){
		e.preventDefault();
		$('#modal_hapus_mhs').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_mhs', function(e){
	        e.preventDefault();
	        $('#notif_hapus_mhs').html('Loading..');
	        $.ajax({
	          url: base_url+'a_mahasiswa/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_mhs').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_mhs', function(e){
		e.preventDefault();
	      $('#modal_mhs').modal();
	      $('#aksi_mhs').val('edit');
	      //$('#nim').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#id_mhs').val(id);

	      $.ajax({
	        url: base_url+'a_mahasiswa/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          $('#nim').val(data.npm);
	          $('#nama_mhs').val(data.nama_mhs);
	          $('#tempat_lahir_mhs').val(data.tempat_lahir);
	          $('#tanggal_lahir_mhs').val(data.tanggal_lahir);
	          $('#no_hp_mhs').val(data.no_hp);
	          $('#jenis_kelamin_mhs').val(data.jenis_kelamin);	          
	          $('#kelas_mhs option').each(function(){
	              if($(this).val() == data.id_kelas){
		                console.log($(this).val());
		                $("#kelas_mhs option[value="+data.id_kelas+"]").attr("selected", true);
		          }
	          });
	          $('#agama_mhs').val(data.agama);
	          $('#alamat_mhs').val(data.alamat);
	          $('#asal_sekolah').val(data.asal_sekolah);
	          $('#tahun_lulus_sekolah').val(data.tahun_lulus);
	          $('#alamat_sekolah').val(data.alamat_sekolah);	          
	          $('#tahun_masuk_kuliah').val(data.tahun_masuk_kuliah);
			  $('#nama_ayah_kandung').val(data.nama_ayah);
			  $('#nama_ibu_kandung').val(data.nama_ibu);
	          //$('#tahun_masuk_kuliah').val(data.tahun_masuk_kuliah);
	        }
	      });
	  });



	/*end mahasiswa*/

	/*pembimbing akademik
	$('#npm').autocomplete({
		source: base_url+''
	});*/
	$(document).on('click', '#view_modal_pem_akademik', function(e){
		e.preventDefault();
		$('#modal_pem_akademik').modal();
		$('#aksi_pem_akademik').val('tambah');
		//bersih_kelas()
	});

	$(document).on('submit', '#form_pem_akademik', function(e){
		e.preventDefault();
		$('#notif_pem_akademik').html('Loading...');
		var data = $('#form_pem_akademik').serialize();
		var aksi = $('#aksi_pem_akademik').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_pem_akademik/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_pem_akademik').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_pem_akademik').serialize();
	        $('#notif_pem_akademik').html('Loading..');
		    $.ajax({
		        url: base_url+'a_pem_akademik/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_pem_akademik').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_pem_akademik', function(e){
		e.preventDefault();
		$('#modal_hapus_pem_akademik').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_pem_akademik', function(e){
	        e.preventDefault();
	        $('#notif_hapus_pem_akademik').html('Loading..');
	        $.ajax({
	          url: base_url+'a_pem_akademik/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_pem_akademik').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_pem_akademik', function(e){
		e.preventDefault();
	      $('#modal_pem_akademik').modal();
	      $('#aksi_pem_akademik').val('edit');
	      $('#npm').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#id_pem_akademik').val(id);

	      $.ajax({
	        url: base_url+'a_pem_akademik/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          $('#npm').val(data.npm);
	                  
	          $('#dosen option').each(function(){
	              if($(this).val() == data.kode_dosen){
		                console.log($(this).val());
		                $("#dosen option[value="+data.kode_dosen+"]").attr("selected", true);
		          }
	          });
	          
	          //$('#tahun_masuk_kuliah').val(data.tahun_masuk_kuliah);
	        }
	      });
	  });

	/*end pembimbing akademik*/

	/*pengampu matakuliah*/
	$(document).on('click', '#view_modal_pem_matkul', function(e){
		e.preventDefault();
		$('#modal_pem_matkul').modal();
		$('#aksi_pem_matkul').val('tambah');
		//bersih_kelas()
	});

	$(document).on('submit', '#form_pem_matkul', function(e){
		e.preventDefault();
		$('#notif_pem_matkul').html('Loading...');
		var data = $('#form_pem_matkul').serialize();
		var aksi = $('#aksi_pem_matkul').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_pem_matkul/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_pem_matkul').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_pem_matkul').serialize();
	        $('#notif_pem_matkul').html('Loading..');
		    $.ajax({
		        url: base_url+'a_pem_matkul/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_pem_matkul').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_pem_matkul', function(e){
		e.preventDefault();
		$('#modal_hapus_pem_matkul').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_pem_matkul', function(e){
	        e.preventDefault();
	        $('#notif_hapus_pem_matkul').html('Loading..');
	        $.ajax({
	          url: base_url+'a_pem_matkul/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_pem_matkul').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_pem_matkul', function(e){
		e.preventDefault();
	      $('#modal_pem_matkul').modal();
	      $('#aksi_pem_matkul').val('edit');
	      $('#matkul').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#id_pem_matkul').val(id);

	      $.ajax({
	        url: base_url+'a_pem_matkul/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          $('#matkul').val(data.kode_matkul);
	                  
	          $('#dosen option').each(function(){
	              if($(this).val() == data.kode_dosen){
		                console.log($(this).val());
		                $("#dosen option[value="+data.kode_dosen+"]").attr("selected", true);
		          }
	          });
	          
	          //$('#tahun_masuk_kuliah').val(data.tahun_masuk_kuliah);
	        }
	      });
	  });


	/*end pengampu matakuliah*/

	/*login*/
	$(document).on('submit', '#form_login', function(e){
		e.preventDefault();
		$('#notif_login').html('Loading..');
		var data = $('#form_login').serialize();
		$.ajax({
			url: base_url+'login/login',
			data: data,
			type: 'POST',
			success: function(msg){
				$('#notif_login').html(msg);
			}
		});
	});
	/*end login*/

	/*peruntukan matakuliah*/
	$(document).on('click', '#view_modal_per_matkul', function(e){
		e.preventDefault();
		$('#modal_per_matkul').modal();
		$('#aksi_per_matkul').val('tambah');
		//bersih_kelas()
	});

	$(document).on('submit', '#form_per_matkul', function(e){
		e.preventDefault();
		$('#notif_per_matkul').html('Loading...');
		var data = $('#form_per_matkul').serialize();
		var aksi = $('#aksi_per_matkul').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_per_matkul/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_per_matkul').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_per_matkul').serialize();
	        $('#notif_per_matkul').html('Loading..');
		    $.ajax({
		        url: base_url+'a_per_matkul/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_per_matkul').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_per_matkul', function(e){
		e.preventDefault();
		$('#modal_hapus_per_matkul').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_per_matkul', function(e){
	        e.preventDefault();
	        $('#notif_hapus_per_matkul').html('Loading..');
	        $.ajax({
	          url: base_url+'a_per_matkul/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_per_matkul').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_per_matkul', function(e){
		e.preventDefault();
	      $('#modal_per_matkul').modal();
	      $('#aksi_per_matkul').val('edit');
	      //$('#matkul').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#id_per_matkul').val(id);

	      $.ajax({
	        url: base_url+'a_per_matkul/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          //$('#matkul').val(data.kode_matkul);
	          $('#matkul option').each(function(){
	              if($(this).val() == data.kode_mk){
		                console.log($(this).val());
		                $("#matkul option[value='"+data.kode_mk+"']").attr("selected", true);
		          }
	          });
	                  
	          $('#kelas option').each(function(){
	              if($(this).val() == data.kode_kelas){
		                console.log($(this).val());
		                $("#kelas option[value='"+data.kode_kelas+"']").attr("selected", true);
		          }
	          });

	          $('#angkatan option').each(function(){
	              if($(this).val() == data.angkatan){
		                console.log($(this).val());
		                $("#angkatan option[value='"+data.angkatan+"']").attr("selected", true);
		          }
	          });

	          $('#semester option').each(function(){
	              if($(this).val() == data.semester){
		                console.log($(this).val());
		                $("#semester option[value='"+data.semester+"']").attr("selected", true);
		          }
	          });
	          
	          //$('#tahun_masuk_kuliah').val(data.tahun_masuk_kuliah);
	        }
	      });
	  });
	/*end peruntukan matakuliah*/

	/*krs*/
	$(document).on('click', '.ambil_matkul', function(e){
		e.preventDefault();
		$('#notif_ambil').html('Loading...');
		var mk = $(this).attr('id');
		var sem = $('#semester').val();
		$.ajax({
			url: base_url+'m_buat_krs/simpan/simpan',
			type: 'POST',
			data: 'mk='+mk+'&sem='+sem,
			success: function(msg){
				$('#notif_ambil').html(msg);
				//console.log(msg);
			}
		});
	});

	$(document).on('click', '.hapus_krs', function(e){
		e.preventDefault();
		$('#notif_hapus_krs').html('Loading...');
		var id = $(this).attr('id');
		$.ajax({
			url: base_url+'m_buat_krs/hapus/hapus',
			type: 'POST',
			data: 'id='+id,
			success: function(msg){
				$('#notif_hapus_krs').html(msg);
			}
		});
	});

	/*end krs*/

	/*blokir*/

	$(document).on('click', '#view_modal_blokir', function(e){
		e.preventDefault();
		$('#modal_blokir').modal();
		$('#aksi_blokir').val('tambah');
		//bersih_kelas()
	});

	$(document).on('submit', '#form_blokir', function(e){
		e.preventDefault();
		$('#notif_blokir').html('Loading...');
		var data = $('#form_blokir').serialize();
		var aksi = $('#aksi_blokir').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_blokir/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_blokir').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_blokir').serialize();
	        $('#notif_blokir').html('Loading..');
		    $.ajax({
		        url: base_url+'a_blokir/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_blokir').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_per_matkul', function(e){
		e.preventDefault();
		$('#modal_hapus_per_matkul').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_per_matkul', function(e){
	        e.preventDefault();
	        $('#notif_hapus_per_matkul').html('Loading..');
	        $.ajax({
	          url: base_url+'a_per_matkul/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_per_matkul').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_blokir', function(e){
		e.preventDefault();
	      $('#modal_blokir').modal();
	      $('#aksi_blokir').val('edit');
	      //$('#matkul').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#id_blokir').val(id);

	      $.ajax({
	        url: base_url+'a_blokir/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          $('#npm').val(data.npm);
	          $('#keterangan').val(data.keterangan);
	          $('#status option').each(function(){
	              if($(this).val() == data.status){
		                console.log($(this).val());
		                $("#status option[value="+data.status+"]").attr("selected", true);
		          }
	          });
	          
	          //$('#tahun_masuk_kuliah').val(data.tahun_masuk_kuliah);
	        }
	      });
	  });
	/*end blokir*/

	/*masa krs*/
	$(document).on('click', '#view_modal_masa_krs', function(e){
		e.preventDefault();
		$('#modal_masa_krs').modal();
		$('#aksi_masa_krs').val('tambah');
		//bersih_kelas()
	});

	$(document).on('submit', '#form_masa_krs', function(e){
		e.preventDefault();
		$('#notif_masa_krs').html('Loading...');
		var data = $('#form_masa_krs').serialize();
		var aksi = $('#aksi_masa_krs').val();

		if(aksi == 'tambah'){
			$.ajax({
				url: base_url+'a_masa_krs/simpan',
				data: data,
				type: 'POST',
				//dataType: 'JSON',
				success: function(msg){
					$('#notif_masa_krs').html(msg);
				}
			});
		}else if(aksi == 'edit'){
			var data=$('#form_masa_krs').serialize();
	        $('#notif_masa_krs').html('Loading..');
		    $.ajax({
		        url: base_url+'a_masa_krs/edit_data',
		        data: data,
		        type:'POST',
		        success: function(msg){
		          $('#notif_masa_krs').html(msg);
		        }
		    }); 
		}
		
	});

	$(document).on('click', '.hapus_masa_krs', function(e){
		e.preventDefault();
		$('#modal_hapus_masa_krs').modal();

		var id = $(this).attr('id');
      
	      $(document).on('click', '#proses_hapus_masa_krs', function(e){
	        e.preventDefault();
	        $('#notif_hapus_masa_krs').html('Loading..');
	        $.ajax({
	          url: base_url+'a_masa_krs/hapus_data',
	          data: 'id='+id,
	          type: 'POST',
	          success: function(msg){
	            $('#notif_hapus_masa_krs').html(msg);
	          }       
	        });
	      })
	});

	$(document).on('click', '.edit_masa_krs', function(e){
		e.preventDefault();
	      $('#modal_masa_krs').modal();
	      $('#aksi_masa_krs').val('edit');
	      //$('#matkul').attr('readonly', true);
	      var id = $(this).attr('id');
	      $('#id_masa_krs').val(id);

	      $.ajax({
	        url: base_url+'a_masa_krs/ambil',
	        data: 'id='+id,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
	          //$('#npm').val(data.npm);
	          //$('#keterangan').val(data.keterangan);
	          $('#status option').each(function(){
	              if($(this).val() == data.status){
		                console.log($(this).val());
		                $("#status option[value="+data.status+"]").attr("selected", true);
		          }
	          });
	          $('#kelas option').each(function(){
	              if($(this).val() == data.id_kelas){
		                console.log($(this).val());
		                $("#kelas option[value="+data.id_kelas+"]").attr("selected", true);
		          }
	          });

	          $('#angkatan option').each(function(){
	              if($(this).val() == data.angkatan){
		                console.log($(this).val());
		                $("#angkatan option[value="+data.angkatan+"]").attr("selected", true);
		          }
	          });

	          $('#semester option').each(function(){
	              if($(this).val() == data.semester){
		                console.log($(this).val());
		                $("#semester option[value="+data.semester+"]").attr("selected", true);
		          }
	          });
	          
	          //$('#tahun_masuk_kuliah').val(data.tahun_masuk_kuliah);
	        }
	      });
	  });
	/*end masa krs*/

	$(document).on('submit', '#show_list_nilai', function(e){
		e.preventDefault();
		var data = $('#show_list_nilai').serialize();
		$('#result_list_nilai').html('Loading....');
		$.ajax({
			url: base_url+'a_input_nilai/show_list_nilai',
			type: 'POST',
			data: data,
			success: function(msg){
				$('#result_list_nilai').html(msg);
			}
		});

	});

	$(document).on('submit', '#form_insert_nilai', function(e){
		e.preventDefault();
		$('#notif_form_insert_nilai').html('Loading....');
		var data = $('#form_insert_nilai').serialize();
		$.ajax({
			url: base_url+'a_input_nilai/proses_insert_nilai',
			type: 'POST',
			data: data,
			success: function(msg){
				$('#notif_form_insert_nilai').html(msg);
			}
		});
	});

	$(document).on('submit', '#show_view_nilai', function(e){
		e.preventDefault();
		var data = $('#show_view_nilai').serialize();
		$('#result_view_nilai').html('Loading....');
		$.ajax({
			url: base_url+'a_lihat_nilai/show_view_nilai',
			type: 'POST',
			data: data,
			success: function(msg){
				$('#result_view_nilai').html(msg);
			}
		});
	});

	$('.submit_simpan_soal').affix({offset: {top: 50} });

	// for (instance in CKEDITOR.instances) {
 //        CKEDITOR.instances[instance].updateElement();
 //    }

	// CKEDITOR.replace( 'isi_soal', {
 //    	// extraPlugins : 'uicolor',
	// 	height: '200px',
	// 	// "filebrowserImageUploadUrl": "/assets/ckeditor/plugins/imgupload/imgupload.php"
 //    });
});
</script>