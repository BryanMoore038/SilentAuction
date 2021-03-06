<?php
include 'dbconfigSilentAuction.php';
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="Index.html">Silent Auction</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li><a href="Donors.php">Donors</a></li>
			<li class="active"><a href="Items.php">Items <span class="sr-only">(current)</span></a></li>
              <li><a href="PrintCenter.php">Print Center</a></li>
			  <li><a href="Lots.php">Lots</a></li>
			<li><a href="Category.php">Category</a></li>
			 <li><a href="BiddingForm.php">Bidding Sheet</a></li>
          </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

    <!--Item entry form-->
    <div class="container">
        <button type="button" class="btn" data-toggle="collapse" data-target="#divCollapse">Add New Item</button>
        <div id="divCollapse" class="collapse">
            <form class="form-horizontal" method="POST" action="CreateItem.php">
                <div class="form-group">
                    <label class="control-label col-sm-2">Description</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="description"  placeholder="Enter Item Description" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Retail Value</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="retailValue" placeholder="Enter Retail Value" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Donor Id</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="donorId" placeholder="Enter Donor Id" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Item table / View / Edit-->
    <div class="container">
        <h2>Items</h2>
        <table class="table table-hover">
            <thead class="thead-inverse">
            <tr>
                <th>Item Id</th>
                <th>Description</th>
                <th>Retail Value</th>
                <th>Donor Id</th>
                <th>Lot Id</th>
                <th>Modify</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM `Items`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $Id = $row["Id"];
                    $Description = $row["Description"];
                    $RetailValue = $row["RetailValue"];
                    $DonorId = $row["DonorId"];
                    $LotId = $row["LotId"];
                echo    "<tr>
                <td>$Id</td>
                <td>$Description</td>
                <td>$RetailValue</td>
                <td>$DonorId</td>
                <td>$LotId</td>
                <td><a href='ModifyItem.php?ItemId=$Id'><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
                <td><a href='DeleteItem.php?ItemId=$Id'<span class=\"glyphicon glyphicon-trash\"></span></a></td>
                </tr>";
                }
            }
            $conn->close();

            //get all donors
            //foreach donor, create new row and print values into a 'td'
            ?>
            </tbody>
        </table>
    </div>



</body>
</html>