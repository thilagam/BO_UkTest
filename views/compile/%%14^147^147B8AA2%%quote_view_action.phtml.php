<?php /* Smarty version 2.6.19, created on 2016-04-26 11:42:49
         compiled from gebo/searchtest/quote_view_action.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/searchtest/quote_view_action.phtml', 19, false),)), $this); ?>
<div class="span12" id="quote_list">
 
                  <table class="table table-bordered table-striped table_vam tdleftalign">
                      <thead>
                      <tr>
                          <th>SlNo</th>
                          <th>Client</th>
                          <th>Category</th>
					             	  <th>QuoteTitle</th>
                          <th>DateOfCreation</th>
                          <th>CreatedBy</th>
                          <th>Status</th>
                          <th>Turnover</th>
                          <th>Action</th>               
                      </tr>
                      </thead>
                      <tbody>

                      <?php if (count($this->_tpl_vars['quoteResult']) > 0): ?> 
                        <?php $_from = $this->_tpl_vars['quoteResult']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['quote']):
?> 
                          <tr>
                          <td><?php echo $this->_tpl_vars['row_min']+1; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quote']['Client']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quote']['Category']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quote']['QuoteTitle']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quote']['DateOfCreation']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quote']['CreatedBy']; ?>
</td>
                          <td> <?php echo $this->_tpl_vars['quoteType'][$this->_tpl_vars['quote']['Status']]; ?>
</td>                         
                          <td><?php echo $this->_tpl_vars['quote']['Turnover']; ?>
 &<?php echo $this->_tpl_vars['quote']['Currency']; ?>
;</td>
                          <td><button type="button" class="btn btn-info btn-lg" >View</button></td>
                      </tr>
                      <?php $this->assign('row_min', $this->_tpl_vars['row_min']+1); ?>
                        <?php endforeach; endif; unset($_from); ?>
                      <?php else: ?>  
                        <tr><td colspan="9">No Results found.</tr>
                      <?php endif; ?>

                      <!-- <?php $this->assign('i', 0); ?>
                      <?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['quoteResult_count']) { ?>
                      <tr>
                          <td><?php echo $this->_tpl_vars['i']+1; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Client']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Category']; ?>
</td>
						  <td><?php echo $this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['QuoteTitle']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['DateOfCreation']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['CreatedBy']; ?>
</td>
                          <td> <?php if ($this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Status'] == briefing): ?>Briefing<?php endif; ?>
                               <?php if ($this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Status'] == not_done): ?>Ongoing<?php endif; ?>
                               <?php if ($this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Status'] == validated): ?>Sent<?php endif; ?>
                               <?php if ($this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Status'] == signed): ?>Signed<?php endif; ?>
                               <?php if ($this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Status'] == closed): ?>Closed<?php endif; ?>
                               <?php if ($this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Status'] == 'deleted'): ?>Deleted<?php endif; ?></td>
                         
                         <td><?php echo $this->_tpl_vars['quoteResult'][$this->_tpl_vars['i']]['Turnover']; ?>
 €</td>
                          <td><button type="button" class="btn btn-info btn-lg" >View</button></td>
                      </tr>
                      <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
                      <?php } ?> -->
                     </tbody>
                       </table>
  
  </div>