<?php

return [

    /*
     * This model will be used for tasks. The only requirement is that
     * it should be or extend the TheDemo\Task\Models\Task model.
     */
    'activity_model' => \TheDemo\Task\Models\Task::class,

    /*
     * This is the name of the table that will be created by the migration and
     * used by the Activity model shipped with this package.
     */
    'table_name' => 'task',
];