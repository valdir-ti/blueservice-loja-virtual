<section class="content-header">
      <h1>
        Permissões
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <form action="<?=BASE_URL?>permissions/add_items_action" method="POST">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Adicionar Item de Permissão</h3>
              <div class="box-tools">
                <input type="submit" class="btn btn-success" value="Salvar">
              </div>
            </div>
            <div class="box-body">

              <div class="form-group <?= (in_array('name', $errorItems))?'has-error':'' ?>">
                <label for="group_name">Nome do Item</label>
                <input type="text" class="form-control" id="group_name" name="name" autocomplete="off"/>
              </div>

              <div class="form-group <?= (in_array('name', $errorItems))?'has-error':'' ?>">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" autocomplete="off"/>
              </div>

            </div>
          </div>

        </form>

    </section>
