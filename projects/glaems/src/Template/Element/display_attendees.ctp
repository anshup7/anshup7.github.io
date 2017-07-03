<h3><?= __('Attendee Details') ?></h3>
<table cellpadding="0" cellspacing="0">
   <thead>
       <tr>
             <th scope="col"><?= $this->Paginator->sort('name') ?></th>
             <th scope="col"><?= $this->Paginator->sort('type') ?></th>
             <th scope="col"><?= $this->Paginator->sort('status') ?></th>
             <th scope="col" class="actions"><?= __('You Can:') ?></th>
       </tr>
   </thead>

   <tbody>
       <tr>
         <td> Anshuman Upadhyay </td>
         <td> Student </td>
         <td> Permitted </td>
       </tr>
  </tbody>
