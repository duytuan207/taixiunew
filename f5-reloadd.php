
    <?php
include_once('function/config.php');
 ?>                         

<!-- -->


    


      <canvas id="line-chart" height="250px" style="font-color: white;"></canvas>
      <?php
      $data_bc = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC limit 21");
$data_bc1 = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC limit 21");
$data_bc2 = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC limit 21");
$data_bc3 = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC limit 21");
$data_bc4 = $mysqli->query("SELECT * FROM `taixiu`   ORDER by id DESC limit 21");

      ?>
      
    <script>


     new Chart(document.getElementById("line-chart"), {
	  type: 'line',
	  data: {
	         

	
		labels: [<?php while($phien=$data_bc->fetch_assoc())
{
    echo''.$phien['id'].',';
    }
    ?>], //Phiên
	
		datasets: [{ 
			data: [<?php while($phien1=$data_bc1->fetch_assoc())
{
    echo''.$phien1['1'].',';
    }
    ?>],
			label: "Xúc sắc 1",
			borderColor: "#3e95cd",
			fill: false
		  }, { 
			data: [<?php while($phien2=$data_bc2->fetch_assoc())
{
    echo''.$phien2[2].',';
    }
    ?>],
			label: "Xúc sắc 2 ",
			borderColor: "#ebf20a",
			fill: false
		  }, 
		  
		   { 
			data: [<?php while($phien3=$data_bc3->fetch_assoc())
{
    echo''.$phien3[3].',';
    }
    ?>],
			label: "Xúc sắc 3 ",
			borderColor: "#01DF01",
			fill: false
		  }, 
		  
		  { 
			data: [<?php while($phien4=$data_bc4->fetch_assoc())
{
    echo''.$phien4[1].'+'.$phien4[2].'+'.$phien4[3].',';
    }
    ?>],
			label: "Tổng ",
			borderColor: "#FF0000",
			fill: true
		  }, 
		]
	  },
	  options: {
		title: {
		  display: true,
		}
	  }
	});
</script>


  




    