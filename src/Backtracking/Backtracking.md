# Backtrack

Algorithm for finding solutions to some computational problems, for exemple solving constraint satisfaction problems.

## Implementation
General implementation
```
# return true when founded a valid solution
function isValide (checked_position): bool
{
    # we reached the last valid leaf of the solution tree
    if (last_position_reached)
        return true;

    # check all next movements inside a tree of possibilities
    for (all_current_next_movement_or_value_possibilities)
    {
        if (is_a_valid_movement) # (optional) for exemple inside the grid
        {
            grille[i][j] = current_checked_movement_or_value;

            # recursively test next value
            if ( isValide (next_checked_position) )
                return true;
        }
    }
    
    # this backtrack to the previous default value
    grille[i][j] = default_value;

    return false;
}
```
