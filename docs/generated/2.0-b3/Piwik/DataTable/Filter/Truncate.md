<small>Piwik\DataTable\Filter</small>

Truncate
========

Truncates a DataTable by merging all rows after a certain index into a new summary row, unless the count of rows is less than the index.

Description
-----------

The [ReplaceSummaryRow](#) filter will be queued after the table is truncated.

### Examples

**Basic usage**

    $dataTable->filter('Truncate', array($truncateAfter = 500));

**Using a custom summary row label**

    $dataTable->filter('Truncate', array($truncateAfter = 500, $summaryRowLabel = Piwik::translate('General_Total')));


Methods
-------

The class defines the following methods:

- [`__construct()`](#__construct) &mdash; Constructor.
- [`filter()`](#filter) &mdash; Executes the filter, see [Truncate](#).
- [`addSummaryRow()`](#addsummaryrow)

<a name="__construct" id="__construct"></a>
<a name="__construct" id="__construct"></a>
### `__construct()`

Constructor.

#### Signature

- It accepts the following parameter(s):
    - `$table` ([`DataTable`](../../../Piwik/DataTable.md))
    - `$truncateAfter`
    - `$labelSummaryRow`
    - `$columnToSortByBeforeTruncating`
    - `$filterRecursive`
- It does not return anything.

<a name="filter" id="filter"></a>
<a name="filter" id="filter"></a>
### `filter()`

Executes the filter, see [Truncate](#).

#### Signature

- It accepts the following parameter(s):
    - `$table`
- It does not return anything.

<a name="addsummaryrow" id="addsummaryrow"></a>
<a name="addSummaryRow" id="addSummaryRow"></a>
### `addSummaryRow()`

#### Signature

- It accepts the following parameter(s):
    - `$table`
- It does not return anything.
