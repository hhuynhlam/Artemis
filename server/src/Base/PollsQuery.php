<?php

namespace Base;

use \Polls as ChildPolls;
use \PollsQuery as ChildPollsQuery;
use \Exception;
use \PDO;
use Map\PollsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'polls' table.
 *
 *
 *
 * @method     ChildPollsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPollsQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     ChildPollsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildPollsQuery orderByOpenDate($order = Criteria::ASC) Order by the open_date column
 * @method     ChildPollsQuery orderByCloseDate($order = Criteria::ASC) Order by the close_date column
 * @method     ChildPollsQuery orderByOptionGroup($order = Criteria::ASC) Order by the option_group column
 * @method     ChildPollsQuery orderByMaxVotes($order = Criteria::ASC) Order by the max_votes column
 * @method     ChildPollsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildPollsQuery orderByTerm($order = Criteria::ASC) Order by the term column
 * @method     ChildPollsQuery orderByWinner($order = Criteria::ASC) Order by the winner column
 *
 * @method     ChildPollsQuery groupById() Group by the id column
 * @method     ChildPollsQuery groupByCategory() Group by the category column
 * @method     ChildPollsQuery groupByTitle() Group by the title column
 * @method     ChildPollsQuery groupByOpenDate() Group by the open_date column
 * @method     ChildPollsQuery groupByCloseDate() Group by the close_date column
 * @method     ChildPollsQuery groupByOptionGroup() Group by the option_group column
 * @method     ChildPollsQuery groupByMaxVotes() Group by the max_votes column
 * @method     ChildPollsQuery groupByDescription() Group by the description column
 * @method     ChildPollsQuery groupByTerm() Group by the term column
 * @method     ChildPollsQuery groupByWinner() Group by the winner column
 *
 * @method     ChildPollsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPollsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPollsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPolls findOne(ConnectionInterface $con = null) Return the first ChildPolls matching the query
 * @method     ChildPolls findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPolls matching the query, or a new ChildPolls object populated from the query conditions when no match is found
 *
 * @method     ChildPolls findOneById(int $id) Return the first ChildPolls filtered by the id column
 * @method     ChildPolls findOneByCategory(int $category) Return the first ChildPolls filtered by the category column
 * @method     ChildPolls findOneByTitle(string $title) Return the first ChildPolls filtered by the title column
 * @method     ChildPolls findOneByOpenDate(string $open_date) Return the first ChildPolls filtered by the open_date column
 * @method     ChildPolls findOneByCloseDate(string $close_date) Return the first ChildPolls filtered by the close_date column
 * @method     ChildPolls findOneByOptionGroup(int $option_group) Return the first ChildPolls filtered by the option_group column
 * @method     ChildPolls findOneByMaxVotes(int $max_votes) Return the first ChildPolls filtered by the max_votes column
 * @method     ChildPolls findOneByDescription(string $description) Return the first ChildPolls filtered by the description column
 * @method     ChildPolls findOneByTerm(int $term) Return the first ChildPolls filtered by the term column
 * @method     ChildPolls findOneByWinner(string $winner) Return the first ChildPolls filtered by the winner column *

 * @method     ChildPolls requirePk($key, ConnectionInterface $con = null) Return the ChildPolls by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOne(ConnectionInterface $con = null) Return the first ChildPolls matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPolls requireOneById(int $id) Return the first ChildPolls filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByCategory(int $category) Return the first ChildPolls filtered by the category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByTitle(string $title) Return the first ChildPolls filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByOpenDate(string $open_date) Return the first ChildPolls filtered by the open_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByCloseDate(string $close_date) Return the first ChildPolls filtered by the close_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByOptionGroup(int $option_group) Return the first ChildPolls filtered by the option_group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByMaxVotes(int $max_votes) Return the first ChildPolls filtered by the max_votes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByDescription(string $description) Return the first ChildPolls filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByTerm(int $term) Return the first ChildPolls filtered by the term column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPolls requireOneByWinner(string $winner) Return the first ChildPolls filtered by the winner column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPolls[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPolls objects based on current ModelCriteria
 * @method     ChildPolls[]|ObjectCollection findById(int $id) Return ChildPolls objects filtered by the id column
 * @method     ChildPolls[]|ObjectCollection findByCategory(int $category) Return ChildPolls objects filtered by the category column
 * @method     ChildPolls[]|ObjectCollection findByTitle(string $title) Return ChildPolls objects filtered by the title column
 * @method     ChildPolls[]|ObjectCollection findByOpenDate(string $open_date) Return ChildPolls objects filtered by the open_date column
 * @method     ChildPolls[]|ObjectCollection findByCloseDate(string $close_date) Return ChildPolls objects filtered by the close_date column
 * @method     ChildPolls[]|ObjectCollection findByOptionGroup(int $option_group) Return ChildPolls objects filtered by the option_group column
 * @method     ChildPolls[]|ObjectCollection findByMaxVotes(int $max_votes) Return ChildPolls objects filtered by the max_votes column
 * @method     ChildPolls[]|ObjectCollection findByDescription(string $description) Return ChildPolls objects filtered by the description column
 * @method     ChildPolls[]|ObjectCollection findByTerm(int $term) Return ChildPolls objects filtered by the term column
 * @method     ChildPolls[]|ObjectCollection findByWinner(string $winner) Return ChildPolls objects filtered by the winner column
 * @method     ChildPolls[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PollsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PollsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Polls', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPollsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPollsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPollsQuery) {
            return $criteria;
        }
        $query = new ChildPollsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPolls|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PollsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PollsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPolls A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `category`, `title`, `open_date`, `close_date`, `option_group`, `max_votes`, `description`, `term`, `winner` FROM `polls` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPolls $obj */
            $obj = new ChildPolls();
            $obj->hydrate($row);
            PollsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPolls|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PollsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PollsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PollsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PollsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the category column
     *
     * Example usage:
     * <code>
     * $query->filterByCategory(1234); // WHERE category = 1234
     * $query->filterByCategory(array(12, 34)); // WHERE category IN (12, 34)
     * $query->filterByCategory(array('min' => 12)); // WHERE category > 12
     * </code>
     *
     * @param     mixed $category The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByCategory($category = null, $comparison = null)
    {
        if (is_array($category)) {
            $useMinMax = false;
            if (isset($category['min'])) {
                $this->addUsingAlias(PollsTableMap::COL_CATEGORY, $category['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($category['max'])) {
                $this->addUsingAlias(PollsTableMap::COL_CATEGORY, $category['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_CATEGORY, $category, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the open_date column
     *
     * Example usage:
     * <code>
     * $query->filterByOpenDate(1234); // WHERE open_date = 1234
     * $query->filterByOpenDate(array(12, 34)); // WHERE open_date IN (12, 34)
     * $query->filterByOpenDate(array('min' => 12)); // WHERE open_date > 12
     * </code>
     *
     * @param     mixed $openDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByOpenDate($openDate = null, $comparison = null)
    {
        if (is_array($openDate)) {
            $useMinMax = false;
            if (isset($openDate['min'])) {
                $this->addUsingAlias(PollsTableMap::COL_OPEN_DATE, $openDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($openDate['max'])) {
                $this->addUsingAlias(PollsTableMap::COL_OPEN_DATE, $openDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_OPEN_DATE, $openDate, $comparison);
    }

    /**
     * Filter the query on the close_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCloseDate(1234); // WHERE close_date = 1234
     * $query->filterByCloseDate(array(12, 34)); // WHERE close_date IN (12, 34)
     * $query->filterByCloseDate(array('min' => 12)); // WHERE close_date > 12
     * </code>
     *
     * @param     mixed $closeDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByCloseDate($closeDate = null, $comparison = null)
    {
        if (is_array($closeDate)) {
            $useMinMax = false;
            if (isset($closeDate['min'])) {
                $this->addUsingAlias(PollsTableMap::COL_CLOSE_DATE, $closeDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($closeDate['max'])) {
                $this->addUsingAlias(PollsTableMap::COL_CLOSE_DATE, $closeDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_CLOSE_DATE, $closeDate, $comparison);
    }

    /**
     * Filter the query on the option_group column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionGroup(1234); // WHERE option_group = 1234
     * $query->filterByOptionGroup(array(12, 34)); // WHERE option_group IN (12, 34)
     * $query->filterByOptionGroup(array('min' => 12)); // WHERE option_group > 12
     * </code>
     *
     * @param     mixed $optionGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByOptionGroup($optionGroup = null, $comparison = null)
    {
        if (is_array($optionGroup)) {
            $useMinMax = false;
            if (isset($optionGroup['min'])) {
                $this->addUsingAlias(PollsTableMap::COL_OPTION_GROUP, $optionGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($optionGroup['max'])) {
                $this->addUsingAlias(PollsTableMap::COL_OPTION_GROUP, $optionGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_OPTION_GROUP, $optionGroup, $comparison);
    }

    /**
     * Filter the query on the max_votes column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxVotes(1234); // WHERE max_votes = 1234
     * $query->filterByMaxVotes(array(12, 34)); // WHERE max_votes IN (12, 34)
     * $query->filterByMaxVotes(array('min' => 12)); // WHERE max_votes > 12
     * </code>
     *
     * @param     mixed $maxVotes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByMaxVotes($maxVotes = null, $comparison = null)
    {
        if (is_array($maxVotes)) {
            $useMinMax = false;
            if (isset($maxVotes['min'])) {
                $this->addUsingAlias(PollsTableMap::COL_MAX_VOTES, $maxVotes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxVotes['max'])) {
                $this->addUsingAlias(PollsTableMap::COL_MAX_VOTES, $maxVotes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_MAX_VOTES, $maxVotes, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the term column
     *
     * Example usage:
     * <code>
     * $query->filterByTerm(1234); // WHERE term = 1234
     * $query->filterByTerm(array(12, 34)); // WHERE term IN (12, 34)
     * $query->filterByTerm(array('min' => 12)); // WHERE term > 12
     * </code>
     *
     * @param     mixed $term The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByTerm($term = null, $comparison = null)
    {
        if (is_array($term)) {
            $useMinMax = false;
            if (isset($term['min'])) {
                $this->addUsingAlias(PollsTableMap::COL_TERM, $term['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($term['max'])) {
                $this->addUsingAlias(PollsTableMap::COL_TERM, $term['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_TERM, $term, $comparison);
    }

    /**
     * Filter the query on the winner column
     *
     * Example usage:
     * <code>
     * $query->filterByWinner('fooValue');   // WHERE winner = 'fooValue'
     * $query->filterByWinner('%fooValue%'); // WHERE winner LIKE '%fooValue%'
     * </code>
     *
     * @param     string $winner The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function filterByWinner($winner = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($winner)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $winner)) {
                $winner = str_replace('*', '%', $winner);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PollsTableMap::COL_WINNER, $winner, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPolls $polls Object to remove from the list of results
     *
     * @return $this|ChildPollsQuery The current query, for fluid interface
     */
    public function prune($polls = null)
    {
        if ($polls) {
            $this->addUsingAlias(PollsTableMap::COL_ID, $polls->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the polls table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PollsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PollsTableMap::clearInstancePool();
            PollsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PollsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PollsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PollsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PollsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PollsQuery
