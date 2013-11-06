<small>Piwik\DataTable</small>

Row
===

This is what a [DataTable](#) is composed of.

Description
-----------

DataTable rows contain columns, metadata and a subtable ID. Columns and metadata
are stored as an array of name => value mappings.


Constants
---------

This class defines the following constants:

- `COLUMNS`
- `METADATA`
- `DATATABLE_ASSOCIATED`

Properties
----------

This class defines the following properties:

- [`$c`](#$c) &mdash; This array contains the row information: - array indexed by self::COLUMNS contains the columns, pairs of (column names, value) - (optional) array indexed by self::METADATA contains the metadata,  pairs of (metadata name, value) - (optional) integer indexed by self::DATATABLE_ASSOCIATED contains the ID of the DataTable associated to this row.
- [`$maxVisitsSummed`](#$maxvisitssummed)

<a name="c" id="c"></a>
<a name="c" id="c"></a>
### `$c`

This array contains the row information: - array indexed by self::COLUMNS contains the columns, pairs of (column names, value) - (optional) array indexed by self::METADATA contains the metadata,  pairs of (metadata name, value) - (optional) integer indexed by self::DATATABLE_ASSOCIATED contains the ID of the DataTable associated to this row.

#### Description

This ID can be used to read the DataTable from the DataTable_Manager.

#### Signature

- It is a `array` value.

<a name="maxvisitssummed" id="maxvisitssummed"></a>
<a name="maxVisitsSummed" id="maxVisitsSummed"></a>
### `$maxVisitsSummed`

#### Signature

- Its type is not specified.


Methods
-------

The class defines the following methods:

- [`__construct()`](#__construct) &mdash; Constructor.
- [`__sleep()`](#__sleep) &mdash; Because $this->c[self::DATATABLE_ASSOCIATED] is negative when the table is in memory, we must prior to serialize() call, make sure the ID is saved as positive integer
- [`cleanPostSerialize()`](#cleanpostserialize) &mdash; Must be called after the row was serialized and __sleep was called.
- [`__destruct()`](#__destruct) &mdash; When destroyed, a row destroys its associated subTable if there is one
- [`__toString()`](#__tostring) &mdash; Applies a basic rendering to the Row and returns the output.
- [`deleteColumn()`](#deletecolumn) &mdash; Deletes the given column.
- [`renameColumn()`](#renamecolumn) &mdash; Renames a column.
- [`getColumn()`](#getcolumn) &mdash; Returns a column by name.
- [`getMetadata()`](#getmetadata) &mdash; Returns the array of all metadata, or one requested metadata value.
- [`getColumns()`](#getcolumns) &mdash; Returns the array containing all the columns.
- [`getIdSubDataTable()`](#getidsubdatatable) &mdash; Returns the ID of the subDataTable.
- [`getSubtable()`](#getsubtable) &mdash; Returns the associated subtable, if one exists.
- [`sumSubtable()`](#sumsubtable) &mdash; Sums a DataTable to this row's subtable.
- [`addSubtable()`](#addsubtable) &mdash; Attaches a subtable to this row.
- [`setSubtable()`](#setsubtable) &mdash; Attaches a subtable to this row, overwriting the existing subtable, if any.
- [`isSubtableLoaded()`](#issubtableloaded) &mdash; Returns true if the subtable is currently loaded in memory via [DataTable\Manager](#).
- [`removeSubtable()`](#removesubtable) &mdash; Removes the subtable reference.
- [`setColumns()`](#setcolumns) &mdash; Set all the columns at once.
- [`setColumn()`](#setcolumn) &mdash; Set the value `$value` to the column called `$name`.
- [`setMetadata()`](#setmetadata) &mdash; Set the value `$value` to the metadata called `$name`.
- [`deleteMetadata()`](#deletemetadata) &mdash; Deletes one metadata value or all metadata values.
- [`addColumn()`](#addcolumn) &mdash; Add a new column to the row.
- [`addColumns()`](#addcolumns) &mdash; Add many columns to this row.
- [`addMetadata()`](#addmetadata) &mdash; Add a new metadata to the row.
- [`sumRow()`](#sumrow) &mdash; Sums the given `$rowToSum` columns values to the existing row column values.
- [`sumRowMetadata()`](#sumrowmetadata) &mdash; Sums the metadata in `$rowToSum` with the metadata in `$this` row.
- [`isSummaryRow()`](#issummaryrow) &mdash; Returns true if this row is the summary row, false if otherwise.
- [`compareElements()`](#compareelements) &mdash; Helper function to compare array elements
- [`isEqual()`](#isequal) &mdash; Helper function that tests if two rows are equal.

<a name="__construct" id="__construct"></a>
<a name="__construct" id="__construct"></a>
### `__construct()`

Constructor.

#### Signature

- It accepts the following parameter(s):
    - `$row`
- It does not return anything.

<a name="__sleep" id="__sleep"></a>
<a name="__sleep" id="__sleep"></a>
### `__sleep()`

Because $this->c[self::DATATABLE_ASSOCIATED] is negative when the table is in memory, we must prior to serialize() call, make sure the ID is saved as positive integer

#### Description

Only serialize the "c" member

#### Signature

- It does not return anything.

<a name="cleanpostserialize" id="cleanpostserialize"></a>
<a name="cleanPostSerialize" id="cleanPostSerialize"></a>
### `cleanPostSerialize()`

Must be called after the row was serialized and __sleep was called.

#### Signature

- It does not return anything.

<a name="__destruct" id="__destruct"></a>
<a name="__destruct" id="__destruct"></a>
### `__destruct()`

When destroyed, a row destroys its associated subTable if there is one

#### Signature

- It does not return anything.

<a name="__tostring" id="__tostring"></a>
<a name="__toString" id="__toString"></a>
### `__toString()`

Applies a basic rendering to the Row and returns the output.

#### Signature

- _Returns:_ describing the row. Example: "- 1 ['label' => 'piwik', 'nb_uniq_visitors' => 1685, 'nb_visits' => 1861] [] [idsubtable = 1375]"
    - `string`

<a name="deletecolumn" id="deletecolumn"></a>
<a name="deleteColumn" id="deleteColumn"></a>
### `deleteColumn()`

Deletes the given column.

#### Signature

- It accepts the following parameter(s):
    - `$name`
- _Returns:_ True on success, false if the column does not exist.
    - `bool`

<a name="renamecolumn" id="renamecolumn"></a>
<a name="renameColumn" id="renameColumn"></a>
### `renameColumn()`

Renames a column.

#### Signature

- It accepts the following parameter(s):
    - `$oldName`
    - `$newName`
- It does not return anything.

<a name="getcolumn" id="getcolumn"></a>
<a name="getColumn" id="getColumn"></a>
### `getColumn()`

Returns a column by name.

#### Signature

- It accepts the following parameter(s):
    - `$name`
- _Returns:_ The column value or false if it doesn't exist.
    - `mixed`
    - `Piwik\DataTable\false`

<a name="getmetadata" id="getmetadata"></a>
<a name="getMetadata" id="getMetadata"></a>
### `getMetadata()`

Returns the array of all metadata, or one requested metadata value.

#### Signature

- It accepts the following parameter(s):
    - `$name`
- It returns a `mixed` value.

<a name="getcolumns" id="getcolumns"></a>
<a name="getColumns" id="getColumns"></a>
### `getColumns()`

Returns the array containing all the columns.

#### Signature

- _Returns:_ Example: ``` array( 'column1'   => VALUE, 'label'     => 'www.php.net' 'nb_visits' => 15894, ) ```
    - `array`

<a name="getidsubdatatable" id="getidsubdatatable"></a>
<a name="getIdSubDataTable" id="getIdSubDataTable"></a>
### `getIdSubDataTable()`

Returns the ID of the subDataTable.

#### Description

If there is no such a table, returns null.

#### Signature

- It can return one of the following values:
    - `int`
    - `null`

<a name="getsubtable" id="getsubtable"></a>
<a name="getSubtable" id="getSubtable"></a>
### `getSubtable()`

Returns the associated subtable, if one exists.

#### Description

Returns `false` if none exists.

#### Signature

- It can return one of the following values:
    - [`DataTable`](../../Piwik/DataTable.md)
    - `bool`

<a name="sumsubtable" id="sumsubtable"></a>
<a name="sumSubtable" id="sumSubtable"></a>
### `sumSubtable()`

Sums a DataTable to this row's subtable.

#### Description

If this row has no subtable a new
one is created.

See [DataTable::addDataTable()](#) to learn how DataTables are summed.

#### Signature

- It accepts the following parameter(s):
    - `$subTable` ([`DataTable`](../../Piwik/DataTable.md))
- It does not return anything.

<a name="addsubtable" id="addsubtable"></a>
<a name="addSubtable" id="addSubtable"></a>
### `addSubtable()`

Attaches a subtable to this row.

#### Signature

- It accepts the following parameter(s):
    - `$subTable` ([`DataTable`](../../Piwik/DataTable.md))
- _Returns:_ Returns `$subTable`.
    - [`DataTable`](../../Piwik/DataTable.md)
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; if a subtable already exists for this row.

<a name="setsubtable" id="setsubtable"></a>
<a name="setSubtable" id="setSubtable"></a>
### `setSubtable()`

Attaches a subtable to this row, overwriting the existing subtable, if any.

#### Signature

- It accepts the following parameter(s):
    - `$subTable` ([`DataTable`](../../Piwik/DataTable.md))
- _Returns:_ Returns `$subTable`.
    - [`DataTable`](../../Piwik/DataTable.md)

<a name="issubtableloaded" id="issubtableloaded"></a>
<a name="isSubtableLoaded" id="isSubtableLoaded"></a>
### `isSubtableLoaded()`

Returns true if the subtable is currently loaded in memory via [DataTable\Manager](#).

#### Signature

- It returns a `bool` value.

<a name="removesubtable" id="removesubtable"></a>
<a name="removeSubtable" id="removeSubtable"></a>
### `removeSubtable()`

Removes the subtable reference.

#### Signature

- It does not return anything.

<a name="setcolumns" id="setcolumns"></a>
<a name="setColumns" id="setColumns"></a>
### `setColumns()`

Set all the columns at once.

#### Description

Overwrites previously set columns.

#### Signature

- It accepts the following parameter(s):
    - `$columns`
- It does not return anything.

<a name="setcolumn" id="setcolumn"></a>
<a name="setColumn" id="setColumn"></a>
### `setColumn()`

Set the value `$value` to the column called `$name`.

#### Signature

- It accepts the following parameter(s):
    - `$name`
    - `$value`
- It does not return anything.

<a name="setmetadata" id="setmetadata"></a>
<a name="setMetadata" id="setMetadata"></a>
### `setMetadata()`

Set the value `$value` to the metadata called `$name`.

#### Signature

- It accepts the following parameter(s):
    - `$name`
    - `$value`
- It does not return anything.

<a name="deletemetadata" id="deletemetadata"></a>
<a name="deleteMetadata" id="deleteMetadata"></a>
### `deleteMetadata()`

Deletes one metadata value or all metadata values.

#### Signature

- It accepts the following parameter(s):
    - `$name`
- _Returns:_ true on success, false if the column didn't exist
    - `bool`

<a name="addcolumn" id="addcolumn"></a>
<a name="addColumn" id="addColumn"></a>
### `addColumn()`

Add a new column to the row.

#### Description

If the column already exists, throws an exception.

#### Signature

- It accepts the following parameter(s):
    - `$name`
    - `$value`
- It does not return anything.
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; if the column already exists.

<a name="addcolumns" id="addcolumns"></a>
<a name="addColumns" id="addColumns"></a>
### `addColumns()`

Add many columns to this row.

#### Signature

- It accepts the following parameter(s):
    - `$columns`
- It returns a `void` value.
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; if any column name does not exist.

<a name="addmetadata" id="addmetadata"></a>
<a name="addMetadata" id="addMetadata"></a>
### `addMetadata()`

Add a new metadata to the row.

#### Description

If the metadata already exists, throws an exception.

#### Signature

- It accepts the following parameter(s):
    - `$name`
    - `$value`
- It does not return anything.
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; if the metadata already exists.

<a name="sumrow" id="sumrow"></a>
<a name="sumRow" id="sumRow"></a>
### `sumRow()`

Sums the given `$rowToSum` columns values to the existing row column values.

#### Description

Only the int or float values will be summed. Label columns will be ignored
even if they have a numeric value.

Columns in `$rowToSum` that don't exist in `$this` are added to `$this`.

#### Signature

- It accepts the following parameter(s):
    - `$rowToSum` ([`Row`](../../Piwik/DataTable/Row.md))
    - `$enableCopyMetadata`
    - `$aggregationOperations`
- It does not return anything.

<a name="sumrowmetadata" id="sumrowmetadata"></a>
<a name="sumRowMetadata" id="sumRowMetadata"></a>
### `sumRowMetadata()`

Sums the metadata in `$rowToSum` with the metadata in `$this` row.

#### Signature

- It accepts the following parameter(s):
    - `$rowToSum`
- It does not return anything.

<a name="issummaryrow" id="issummaryrow"></a>
<a name="isSummaryRow" id="isSummaryRow"></a>
### `isSummaryRow()`

Returns true if this row is the summary row, false if otherwise.

#### Description

This function
depends on the label of the row, and so, is not 100% accurate.

#### Signature

- It returns a `bool` value.

<a name="compareelements" id="compareelements"></a>
<a name="compareElements" id="compareElements"></a>
### `compareElements()`

Helper function to compare array elements

#### Signature

- It accepts the following parameter(s):
    - `$elem1`
    - `$elem2`
- It returns a `bool` value.

<a name="isequal" id="isequal"></a>
<a name="isEqual" id="isEqual"></a>
### `isEqual()`

Helper function that tests if two rows are equal.

#### Description

Two rows are equal if:

- they have exactly the same columns / metadata
- they have a subDataTable associated, then we check that both of them are the same.

#### Signature

- It accepts the following parameter(s):
    - `$row1` ([`Row`](../../Piwik/DataTable/Row.md))
    - `$row2` ([`Row`](../../Piwik/DataTable/Row.md))
- It returns a `bool` value.
