<?php

if(isset($_GET['page']))
{
    if($_GET['page'] = 'archive')
    {
        $query = 'SELECT * FROM users WHERE role = "user" AND status = "Archived" ';
        $archive = 'active';
        $active = '';
    }
}else{
    $query = 'SELECT * FROM users WHERE role = "user" AND status = "Active" ';
    $active = 'active';
    $archive = '';
}


$row = query_row($query);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?=$active?>" aria-current="page" href="../views/users.php">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$archive?>" href="../views/users.php?page=archived">Archive</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php


for ($i = 0; $i < count($row); $i++) {
?>

    <tr>
        <td scope="col"><?= $i + 1 ?></td>
        <td scope="col"><?= $row[$i]['username'] ?></td>
        <td scope="col"><?= $row[$i]['email'] ?></td>
        <td scope="col"><?= $row[$i]['firstname'] ?></td>
        <td scope="col"><?= $row[$i]['lastname'] ?></td>
        <td scope="col">
            <div>
                <a href="../views/users.php?url=editUser&id=<?=$row[$i]['id']?>" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>
                    </i></a>
                <a onclick="return confirm('Are you sure you want to ARCHIVE this User?')" href="../views/users.php?url=archive&id=<?=$row[$i]['id']?>" class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                    </svg>
                </a>
            </div>

        </td>
    </tr>

<?php } ?>