<html>
        <head>
                <title><?php echo $page_title; ?></title>
        </head>
        <body>

                <h1><?php echo $title; ?></h1>
                <h2>
                <?php 
                
                $this->load->helper(array('form','url'));
                if ($this->session->userdata('user') == TRUE ) {
                    echo "Welcome: ".$this->session->userdata('user'); 
                    echo form_open('logout');
                    echo form_submit('submit','logout');
                    echo form_close();
                      }
                else 
                    {
                   
                    }
                ?>
                </h2>