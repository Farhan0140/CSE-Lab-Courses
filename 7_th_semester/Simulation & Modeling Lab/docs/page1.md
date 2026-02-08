# 1. Scalar & Array Operations

## 🔢 1. Input data

```python
scalar = 3.7
arr = np.array([62, 8, 1.2, 45.7786, 6, 9])
```

* `scalar` → a **single number**
* `arr` → a **NumPy array** with mixed integers and floats

👉 NumPy applies every math function **element-wise** on `arr`.

---

## 📐 2. Trigonometric functions

```python
sin_values = np.sin(arr)
cos_values = np.cos(arr)
tan_values = np.tan(arr)
```

* Computes **sin, cos, tan** for each element
* Input is in **radians**
* That’s why values look irregular — numbers like `62` radians are many rotations around the circle

### Visualization insight

* The **sin, cos, tan** values change rapidly
* `tan` jumps a lot because it has **asymptotes** (it can blow up)

---

## 🔄 3. Inverse trigonometric functions

```python
asin_values = np.arcsin(np.clip(arr / np.max(arr), -1, 1))
acos_values = np.arccos(np.clip(arr / np.max(arr), -1, 1))
atan_values = np.arctan(arr)
```

### Why normalization & clipping?

* `arcsin` and `arccos` only accept values in **[-1, 1]**
* `arr / np.max(arr)` → scales values into **[0, 1]**
* `np.clip(..., -1, 1)` → guarantees valid input

👉 This prevents **math domain errors**.

---

## 📈 4. Exponential and logarithm

```python
exp_values = np.exp(arr)
log_values = np.log(arr)
```

* `np.exp(x)` → ( e^x ) (grows extremely fast)
* `np.log(x)` → natural logarithm (only works for **positive numbers**)

### Visualization insight

* `exp` explodes for large values (like `62`)
* `log` grows **slowly** and looks almost flat in comparison


---

## ➕ 5. Absolute value and square root

```python
abs_values = np.abs(arr)
sqrt_values = np.sqrt(arr)
```

* `abs` → distance from zero
* `sqrt` → square root (only valid for values ≥ 0)

### Visualization insight

* Produces a smooth, increasing curve
* Larger input → larger square root, but **growth slows down**

---

## ➗ 6. Remainder (modulus)

```python
rem_values = np.remainder(arr, 2)
```

* Computes `arr % 2`
* Interpretation:

  * `0` → even number
  * non-zero → odd or fractional remainder

👉 Commonly used in **parity checks** and **cyclic patterns**.

---

## 🔢 7. Rounding functions

```python
round_values = np.round(arr)
floor_values = np.floor(arr)
ceil_values = np.ceil(arr)
```

| Function | Meaning           |
| -------- | ----------------- |
| `round`  | Nearest integer   |
| `floor`  | Always round down |
| `ceil`   | Always round up   |

### Example

For the value `45.7786`:

* `round` → `46`
* `floor` → `45`
* `ceil` → `46`

---

## 🖨️ 8. Printing results

```python
print("sin:", sin_values)
print("cos:", cos_values)
print("tan:", tan_values)
print("asin:", asin_values)
print("acos:", acos_values)
print("atan:", atan_values)
print("exp:", exp_values)
print("log:", log_values)
print("abs:", abs_values)
print("sqrt:", sqrt_values)
print("rem:", rem_values)
print("round:", round_values)
print("floor:", floor_values)
print("ceil:", ceil_values)
```

Each line prints the **array output** of the corresponding NumPy function.

```
sin: [-0.7391807   0.98935825  0.93203909  0.97468097 -0.2794155   0.41211849]
cos: [ 0.67350716 -0.14550003  0.36235775 -0.22360009  0.96017029 -0.91113026]
tan: [-1.09750978 -6.79971146  2.57215162 -4.35903661 -0.29100619 -0.45231566]
asin: [1.57079633 0.12939302 0.01935605 0.83064204 0.09692589 0.14567599]
acos: [0.         1.44140331 1.55144028 0.74015429 1.47387044 1.42512034]
atan: [1.55466869 1.44644133 0.87605805 1.54895553 1.40564765 1.46013911]
exp: [8.43835667e+26 2.98095799e+03 3.32011692e+00 7.61015267e+19 4.03428793e+02 8.10308393e+03]
log: [4.12713439 2.07944154 0.18232156 3.82381673 1.79175947 2.19722458]
abs: [62.      8.      1.2    45.7786  6.      9.    ]
sqrt: [7.87400787 2.82842712 1.09544512 6.76598847 2.44948974 3.        ]
rem: [0.     0.     1.2    1.7786 0.     1.    ]
round: [62.  8.  1. 46.  6.  9.]
floor: [62.  8.  1. 45.  6.  9.]
ceil: [62.  8.  2. 46.  6.  9.]
```

# 3×2 Matrix Calculations

## 🔢 1. Creating a 3×2 matrix

```python
matrix = np.array([[1.000, 242],
                   [3.47875, -4.67],
                   [500, -6]])
```

* Creates a **3 rows × 2 columns NumPy matrix**
* The matrix contains:

  * Positive values
  * Negative values
  * Small decimal values
  * Very large numbers (e.g., `500`)


---

## 📐 2. Trigonometric functions

```python
sin_values = np.sin(matrix)
cos_values = np.cos(matrix)
tan_values = np.tan(matrix)
```

* Computes **sin, cos, and tan** for *each element* in the matrix
* Inputs are interpreted as **radians**
* Large values such as `242` and `500` represent **many full rotations**, so outputs appear irregular
* `tan` may produce very large values due to **asymptotes**

👉 The output shape remains **3×2**, same as the input matrix.

---

## 🔄 3. Inverse trigonometric functions

```python
asin_values = np.arcsin(np.clip(matrix / np.max(matrix), -1, 1))
acos_values = np.arccos(np.clip(matrix / np.max(matrix), -1, 1))
atan_values = np.arctan(matrix)
```

### Why normalization and clipping?

* `arcsin` and `arccos` only accept values in the range **[-1, 1]**
* `np.max(matrix)` finds the maximum value in the matrix (`500`)
* `matrix / np.max(matrix)` scales values into approximately **[-1, 1]**
* `np.clip(..., -1, 1)` ensures values remain within the valid domain

👉 This prevents **math domain errors**.

* `arctan` has **no input restriction**, so it can be applied directly

---

## 📈 4. Exponential and logarithm

```python
exp_values = np.exp(matrix)
log_values = np.log(matrix)
```

### Exponential (`np.exp`)

* Computes ( e^x )
* Large inputs like `500` cause **overflow**, resulting in `inf`

### Logarithm (`np.log`)

* Computes the **natural logarithm (base e)**
* Only defined for **positive values**
* Negative values such as `-4.67` and `-6` return **`nan` (not a number)**

👉 This behavior is mathematically expected.

---

## ➕ 5. Absolute value and square root

```python
abs_values = np.abs(matrix)
sqrt_values = np.sqrt(matrix)
```

* `np.abs` converts all values to **non-negative magnitudes**
* `np.sqrt`:

  * Works only for non-negative values
  * Produces **`nan`** for negative inputs

Example:

* `sqrt(-4.67)` → `nan`

---

## ➗ 6. Remainder (modulus)

```python
rem_values = np.remainder(matrix, 2)
```

* Computes `matrix % 2`
* Output interpretation:

  * `0` → even numbers
  * Decimal values → fractional remainders
  * Works correctly for **negative numbers**


---

## 🔢 7. Rounding functions

```python
round_values = np.round(matrix)
floor_values = np.floor(matrix)
ceil_values = np.ceil(matrix)
```

| Function | Behavior                      |
| -------- | ----------------------------- |
| `round`  | Rounds to the nearest integer |
| `floor`  | Always rounds down            |
| `ceil`   | Always rounds up              |

### Example

For the value `3.47875`:

* `round` → `3`
* `floor` → `3`
* `ceil` → `4`

---

## 🖨️ 8. Displaying results

```python
print("Matrix:\n", matrix)
print("\nsin:\n", sin_values)
print("\ncos:\n", cos_values)
print("\ntan:\n", tan_values)
print("\nasine:\n", asin_values)
print("\nacosine:\n", acos_values)
print("\natangent:\n", atan_values)
print("\nexp:\n", exp_values)
print("\nlog (natural):\n", log_values)
print("\nabs:\n", abs_values)
print("\nsqrt:\n", sqrt_values)
print("\nrem (remainder when divided by 2):\n", rem_values)
print("\nround:\n", round_values)
print("\nfloor:\n", floor_values)
print("\nceil:\n", ceil_values)
```
```
Matrix:
 [[  1.      242.     ]
 [  3.47875  -4.67   ]
 [500.       -6.     ]]

sin:
 [[ 0.84147098 -0.09721191]
 [-0.33080582  0.99910172]
 [-0.46777181  0.2794155 ]]

cos:
 [[ 0.54030231 -0.99526371]
 [-0.94369884 -0.04237629]
 [-0.88384927  0.96017029]]

tan:
 [[  1.55740772   0.09767452]
 [  0.35054173 -23.57690554]
 [  0.52924386   0.29100619]]

asin:
 [[ 0.002       0.50522004]
 [ 0.00695756 -0.00934014]
 [ 1.57079633 -0.01200029]]

acos:
 [[1.56879633 1.06557629]
 [1.56383877 1.58013646]
 [0.         1.58279661]]

atan:
 [[ 0.78539816  1.56666412]
 [ 1.29088384 -1.35984924]
 [ 1.56879633 -1.40564765]]

exp:
 [[2.71828183e+000 1.25679551e+105]
 [3.24191728e+001 9.37226953e-003]
 [1.40359222e+217 2.47875218e-003]]

log (natural, safe):
 [[nan nan]
 [nan nan]
 [nan nan]]

abs:
 [[  1.      242.     ]
 [  3.47875   4.67   ]
 [500.        6.     ]]

sqrt (safe):
 [[nan nan]
 [nan nan]
 [nan nan]]

remainder (mod 2):
 [[1.      0.     ]
 [1.47875 1.33   ]
 [0.      0.     ]]

round:
 [[  1. 242.]
 [  3.  -5.]
 [500.  -6.]]

floor:
 [[  1. 242.]
 [  3.  -5.]
 [500.  -6.]]

ceil:
 [[  1. 242.]
 [  4.  -4.]
 [500.  -6.]]
```