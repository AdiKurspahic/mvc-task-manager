<?php include "../views/partials/header.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Zadaci</h2>
    <a href="index.php?controller=task&action=create" class="btn btn-primary">Dodaj zadatak</a>
</div>

<div class="card border-0 shadow-sm mb-3">
    <div class="card-body">
        <label for="searchInput" class="form-label mb-2">Pretraga zadataka</label>
        <input type="text" id="searchInput" class="form-control" placeholder="Upiši naslov zadatka...">
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0" id="tasksTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Naslov</th>
                        <th>Opis</th>
                        <th>Rok</th>
                        <th>Status</th>
                        <th>Kategorija</th>
                        <th class="text-end">Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($tasks && $tasks->num_rows > 0): ?>
                        <?php while($row = $tasks->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row["id"]; ?></td>
                                <td><?= htmlspecialchars($row["title"]); ?></td>
                                <td><?= htmlspecialchars($row["description"]); ?></td>
                                <td><?= htmlspecialchars($row["due_date"]); ?></td>
                                <td><span class="badge bg-secondary"><?= htmlspecialchars($row["status"]); ?></span></td>
                                <td><?= htmlspecialchars($row["category_name"]); ?></td>
                                <td class="text-end">
                                    <a href="index.php?controller=task&action=edit&id=<?= $row["id"]; ?>" class="btn btn-warning btn-sm">Uredi</a>
                                    <a href="index.php?controller=task&action=delete&id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm delete-btn">Obriši</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Nema unesenih zadataka.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "../views/partials/footer.php"; ?>