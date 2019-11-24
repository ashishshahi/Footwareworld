<?php

class Products extends CI_Controller
{
	
	public function index()
	{
			if(adminLoggedIn())
			{
					$data['Brands'] = $this->modAdmin->getBrands();
					$data['cateogries'] = $this->modAdmin->getCateogries();
					$data['SubCat'] = $this->modAdmin->getSubCateogries();
					$data['Manufacturer'] = $this->modAdmin->getManufacturer();
					$data['Retailer'] = $this->modAdmin->getRetailer();
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/products/newProduct',$data);
					$this->load->view('admin/header/footer');

			}else
			{
				setFlashData('alert-danger','Please Login..','admin/login');
			}	
	}
	public function addProduct()
	{
		if(adminLoggedIn())
		{
			$data['p_name'] = $this->input->post('productName',true);
			$data['p_size'] = $this->input->post('productSize',true);
			$data['p_cat'] = $this->input->post('productCat',true);
			$data['p_subcat'] = $this->input->post('productSubCat',true);
			$data['p_brand'] = $this->input->post('productBrand',true);
			$data['p_manuf'] = $this->input->post('productManufact',true);
			$data['p_retailer'] = $this->input->post('productRetailer',true);
			$data['p_qty'] = $this->input->post('productQuant',true);
			$data['p_description'] = $this->input->post('productDesc',true);
			if(!empty($data['p_name']) && !empty($data['p_size']) && !empty($data['p_cat']) && !empty($data['p_subcat']) && !empty($data['p_brand']) && !empty($data['p_manuf']) && !empty($data['p_qty']) && !empty($data['p_description']) && !empty($data['p_retailer']))
			{
					$data['date'] = date('Y-M-d h:i:sa');
					$data['posted_by'] = getAdminName();
					//$data['p_image_id'] = getProductImageId();
					$addData = $this->modProducts->checkProduct($data);
					if ($addData->num_rows() >0) {
						setFlashData('alert-danger','Product Already Exists.','Products/index');
					}else
					{
							$addData = $this->modProducts->addProduct($data);
							if($addData)
							{
								setFlashData('alert-success','You have Sucessfully Added Your Product.','Products/index');
							}else
							{
								setFlashData('alert-danger','You Can\'t Add Your Product Right Now.','Products/index');
							}
					}
				
			}else{
				setFlashData('alert-warning','Product Name is Required','Products/index');
			}

		}else{
			setFlashData('alert-warning','Please Login First to add your Products','admin/login');
		}
	}
	public function allProducts()
	{
		if (adminLoggedIn()) {
			$config['base_url'] = site_url('Products/allProducts');
			$totalRows = $this->modProducts->getAllProducts();
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allProducts'] = $this->modProducts->fetchAllProducts($config['per_page'],$page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/header/header');
			$this->load->view('admin/header/css');
			$this->load->view('admin/header/navtop');
			$this->load->view('admin/header/navleft');
			$this->load->view('admin/products/allProducts',$data);
			$this->load->view('admin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login First .','admin/login');
		}
		
	}
	public function editProducts($pId)
	{
		if(adminLoggedIn())
		{
			if (!empty($pId) && isset($pId)) {
				$data['Products'] = $this->modProducts->checkProductById($pId);
				$data['Brands'] = $this->modAdmin->getBrands();
				$data['cateogries'] = $this->modAdmin->getCateogries();
				$data['SubCat'] = $this->modAdmin->getSubCateogries();
				$data['Manufacturer'] = $this->modAdmin->getManufacturer();
				$data['Retailer'] = $this->modAdmin->getRetailer();
				if (count($data['Products']) == 1) {
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/products/editProduct',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','Product Not Found','Products/index');
				}	
			} else {
				setFlashData('alert-danger','Something Went Wrong','Products/index');
			}
			

		}else
		{
			setFlashData('alert-warning','Please Login First then Edit Cateogry','admin/login');
		}
	}
	public function updateProduct()
	{
		if (adminLoggedIn()) {
			$data['p_name'] = $this->input->post('productName',true);
			$data['p_size'] = $this->input->post('productSize',true);
			$data['p_cat'] = $this->input->post('productCat',true);
			$data['p_subcat'] = $this->input->post('productSubCat',true);
			$data['p_brand'] = $this->input->post('productBrand',true);
			$data['p_manuf'] = $this->input->post('productManufact',true);
			$data['p_retailer'] = $this->input->post('productRetailer',true);
			$data['p_qty'] = $this->input->post('productQuant',true);
			$data['p_description'] = $this->input->post('productDesc',true);
			$pId = $this->input->post('xid',true);
		
		if (!empty($data['p_name']) && isset($data['p_name'])) {
			/*$addData = $this->modProducts->checkProduct($data);
			if ($addData->num_rows() >0) {
				setFlashData('alert-danger','Product Already Exists.','Products/index');
			}else
			{*/
			$reply = $this->modProducts->updateProduct($data,$pId);
			if ($reply) {
				setFlashData('alert-success','Product Sucessfully Updated','Products/allProducts');
				
			} else {
				setFlashData('alert-danger','You Can\'t Update Product Right Now.','Products/allProducts');
			}
			//}
		} else {
			setFlashData('alert-danger','Product Name Must Be Required.','Products/allProducts');
		}
		
		} else {
			setFlashData('alert-warning','Please Login First then Edit Product','admin/login');
		}
		
	}
	public function deleteProduct()
	{
		if (adminLoggedIn()) {
			if ($this->input->is_ajax_request()) {
				$this->input->post('id',true);
				$pId = $this->input->post('text',true);
				if (!empty($pId) && isset($pId)) {
					$pId = $this->encryption->decrypt($pId);
					$checkMd = $this->modProducts->deleteProduct($pId);
					if ($checkMd) {
						$data['return'] = true;
						$data['message'] = 'Sucessfully Deleted';
						echo json_encode($data);
					} else {
						$data['return'] = false;
						$data['message'] = 'You Can\'t Delete your Products Right Now.';
						echo json_encode($data);
						}
				} else {
						$data['return'] = false;
						$data['message'] = 'Value Not Exists.';
						echo json_encode($data);
					
				}	
			} else {
				setFlashData('alert-warning','Something Went Wrong.','Products');
			}	
		} else {
			setFlashData('alert-warning','Please Login First then Delete Products','admin/login');
		}
	}
	public function addMultiImage()
	{
		if (adminLoggedIn()) {
			$path = realpath(APPPATH.'../assets/images/products');
			$config['upload_path'] = $path;
			$config['max_size'] = 1000;
			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$this->load->library('upload',$config);
			
			if(!$this->upload->do_upload('mulProduct'))
			{
				$error = $this->upload->display_errors();
				setFlashData('alert-danger',$error,'Products/index');
			}else
			{
				$fileName = $this->upload->data();
				$data['p_img_name'] = $fileName['file_name'];
				$data['date'] = date('Y-M-d h:i:sa');
				$addData = $this->modProducts->addMultiImage($data);
				if($addData)
				{
					setFlashData('alert-success','You have Sucessfully Added Your Products Image.','Products/index');
				}else
				{
					setFlashData('alert-danger','You Can\'t Add Your Products Right Now.','Products/index');
				}
			}
		} else {
			setFlashData('alert-warning','Please Login First then Add Products Images','admin/login');
		}
		
	}
	  public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}