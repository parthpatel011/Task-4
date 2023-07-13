<!DOCTYPE html>
<html>
<head>
  <title>Education Portal Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #333;
      color: #fff;
      padding: 20px;
    }

    h1 {
      margin: 0;
          text-align: center;

    }

    .dashboard {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 50px;
    }

    .dashboard-buttons {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 20px;
      margin-top: 30px;
    }

    .dashboard-button {
      padding: 15px 20px;
      background-color: #f1f1f1;
      border-radius: 5px;
      text-align: center;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Education Portal Dashboard</h1>
  </div>
  <div class="dashboard">
    <div class="dashboard-buttons">
      <a href="chapters.php" class="dashboard-button">List of Chapters</a>
      <a href="subjects.php" class="dashboard-button">List of Subjects</a>
      <a href="standard.php" class="dashboard-button">List of Standard</a>
      <a href="cts.php" class="dashboard-button">Assign Chapter to Subjects</a>
      <a href="sts.php" class="dashboard-button">Assign Subjects to Standard</a>
      <a href="stdTostud.php" class="dashboard-button">Assign Standard to Student</a>
      <a href="dashboard.php" class="dashboard-button">Dashboard</a>
    </div>
  </div>
</body>
</html>
