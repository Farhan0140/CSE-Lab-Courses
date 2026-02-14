# Matrix Operations and Visualization

## 2️⃣ Creating Random 3×3 Matrices

```python
A = np.random.randint(0, 10, (3, 3))
```

* Creates a **3×3 matrix** `A`
* Values are random integers between **0 and 9**

```python
B = np.random.randint(0, 10, (3, 3))
```

* Creates another **3×3 matrix** `B` with the same value range

---

## 3️⃣ Matrix Arithmetic Operations

### ➕ Addition

```python
add = A + B
```

* Adds matrices `A` and `B` **element-wise**

### ➖ Subtraction

```python
sub = A - B
```

* Subtracts matrix `B` from `A` **element-wise**

### ✖️ Matrix Multiplication

```python
mul = np.dot(A, B)
```

* Performs **matrix multiplication**
* Uses row × column multiplication (not element-wise)

---

## 4️⃣ Printing Matrix Results

```python
print("Addition: \n", add)
print("\nSubtraction: \n", sub)
print("\nMultiplication: \n", mul)
```
```
Addition: 
 [[ 7  3 11]
 [ 2 13  3]
 [ 9  0  8]]

Subtraction: 
 [[-5  1  7]
 [-2 -5 -3]
 [ 9  0 -8]]

Multiplication: 
 [[10 19 80]
 [ 8 36 12]
 [54  9 18]]
```

---

## 5️⃣ Determinant of Matrix B

```python
det = np.linalg.det(B)
```

* Computes the **determinant** of matrix `B`
* Determinant tells whether a matrix is **invertible**

---

## 6️⃣ Inverse of Matrix B

```python
if det != 0:
```

* Checks if determinant is **non-zero**
* Only non-zero determinant matrices are invertible

```python
    inv = np.linalg.inv(B)
```

* Computes the **inverse of matrix B**

```python
else:
    inv = "Matrix is Singular, cannot compute"
```

* If determinant is zero, inverse does not exist

---

## 7️⃣ Rank of Matrix B

```python
rank = np.linalg.matrix_rank(B)
```

* Calculates the **rank**
* Rank = number of **linearly independent rows or columns**

---

## 8️⃣ Printing Linear Algebra Results

```python
print("Determinant of Matrix B: ", det)
print("\nInverse Matrix: \n", inv)
print("\nRank of Matrix B: ", rank)
```
```
Determinant of Matrix B:  416.0

Inverse Matrix: 
 [[ 0.17307692 -0.01923077 -0.03605769]
 [-0.03846154  0.11538462 -0.03365385]
 [ 0.          0.          0.125     ]]

Rank of Matrix B:  3
```

---

## 9️⃣ Creating Two Random Vectors

```python
vector1 = np.random.rand(15)
```

* Creates a vector with **15 random floating-point values** between 0 and 1

```python
vector2 = np.random.rand(15)
```

* Creates another vector of same size

---

## 🔟 Plotting the Vectors

```python
plt.figure()
```

* Creates a new figure (plot window)

```python
plt.plot(vector1, marker='o', label='Vector 1')
```

* Plots `vector1`
* Uses circle markers

```python
plt.plot(vector2, marker='s', label='Vector 2')
```

* Plots `vector2`
* Uses square markers

---

## 1️⃣1️⃣ Adding Labels and Title

```python
plt.xlabel("Index")
```

* X-axis label

```python
plt.ylabel("Value")
```

* Y-axis label

```python
plt.title("Comparison of Two Random Vectors")
```

* Plot title

```python
plt.legend()
```

* Shows legend identifying vectors

```python
plt.show()
```

![Plot Output](images/plot.png)

---

## 1️⃣2️⃣ Creating a 4×4 Random Matrix

```python
mat = np.random.rand(4, 4)
```

* Creates a **4×4 matrix** with random floats (0–1)

---

## 1️⃣3️⃣ Heatmap Visualization

```python
sns.heatmap(mat, annot=True, cmap='copper', linewidths=1, linecolor='white')
```

* Displays matrix values as a **heatmap**
* `annot=True` → shows values inside cells
* `cmap='copper'` → color scheme
* `linewidths` & `linecolor` → grid lines

```python
plt.title('Heatmap of 4x4 Matrix')
```

* Adds title

```python
plt.show()
```

![Plot Output](images/plot.png)

---

## 1️⃣4️⃣ Creating Two More 4×4 Matrices

```python
A = np.random.rand(4, 4)
B = np.random.rand(4, 4)
```

* Creates two new random matrices

---

## 1️⃣5️⃣ Matrix Operations Again

```python
add = A + B
sub = A - B
mul = np.dot(A, B)
```

* Performs addition, subtraction, and multiplication

---

## 1️⃣6️⃣ Creating Subplots

```python
fig, col = plt.subplots(1, 3, figsize=(15, 5))
```

* Creates **1 row, 3 columns** of plots
* `col` is an array of axes objects

---

## 1️⃣7️⃣ Bar Plot – Matrix Addition

```python
col[0].bar(range(1, 17), add.flatten(), color='b')
```

* Flattens 4×4 matrix into 16 values
* Displays them as a bar chart

```python
col[0].set_title('Matrix Addition')
```

* Title

```python
col[0].set_xlabel('Index')
col[0].set_ylabel('Value')
```

* Axis labels

---

## 1️⃣8️⃣ Bar Plot – Matrix Subtraction

```python
col[1].bar(range(1, 17), sub.flatten(), color='g')
```

* Bar plot for subtraction results

```python
col[1].set_title('Matrix Subtraction')
```

---

## 1️⃣9️⃣ Bar Plot – Matrix Multiplication

```python
col[2].bar(range(1, 17), mul.flatten(), color='m')
```

* Bar plot for multiplication results

```python
col[2].set_title('Matrix Product')
```

---

## 2️⃣0️⃣ Final Layout and Display

```python
plt.tight_layout()
```

* Adjusts spacing to avoid overlap

```python
plt.show()
```

![Plot Output](images/plot.png)

<br>
<br>
<br>
<br>

# 🎨 Designing Plots in Matplotlib and Seaborn

## 1️⃣ Using **Line Styles** in `matplotlib.pyplot`

### Syntax

```python
plt.plot(x, y, linestyle='--')
```

### Example

```python
import matplotlib.pyplot as plt
import numpy as np

x = np.arange(0, 10)
y = x ** 2

plt.plot(x, y, linestyle='--', color='r')
plt.title("Dashed Red Line")
plt.show()
```

### Common Line Styles

| Style    | Usage Example      |
| -------- | ------------------ |
| `'-'`    | `linestyle='-'`    |
| `'--'`   | `linestyle='--'`   |
| `'-.'`   | `linestyle='-.'`   |
| `':'`    | `linestyle=':'`    |
| `'None'` | `linestyle='None'` |

---

## 2️⃣ Using **Markers** in `matplotlib.pyplot`

### Syntax

```python
plt.plot(x, y, marker='o')
```

### Example

```python
plt.plot(x, y, marker='s', linestyle='-', color='g')
plt.title("Green Square Markers with Solid Line")
plt.show()
```

### Marker Meaning

| Marker | Description |
| ------ | ----------- |
| `'.'`  | point       |
| `','`  | pixel       |
| `'o'`  | circle      |
| `'s'`  | square      |
| `'D'`  | diamond     |
| `'h'`  | hexagon     |
| `'p'`  | pentagon    |

---

## 3️⃣ Using **Colors** in `matplotlib.pyplot`

### Syntax

```python
plt.plot(x, y, color='b')
```

### Example

```python
plt.plot(x, y, color='m', marker='D', linestyle=':')
plt.title("Magenta Dotted Line with Diamond Markers")
plt.show()
```

### Color Codes

| Code  | Color   |
| ----- | ------- |
| `'b'` | blue    |
| `'g'` | green   |
| `'r'` | red     |
| `'c'` | cyan    |
| `'m'` | magenta |
| `'y'` | yellow  |
| `'k'` | black   |
| `'w'` | white   |

---

## 4️⃣ Combining **Line Style + Marker + Color** (Most Used)

### Example

```python
plt.plot(x, y,
         linestyle='-.',
         marker='o',
         color='c',
         label='Data Line')

plt.legend()
plt.title("Styled Line Plot")
plt.show()
```

✅ This is the **most common professional plotting pattern**.

---

## 5️⃣ Short-Hand Format (One-Line Style Code)

### Syntax

```python
plt.plot(x, y, 'ro--')
```

### Meaning

* `'r'` → red
* `'o'` → circle marker
* `'--'` → dashed line

### Example

```python
plt.plot(x, y, 'gs-.')
plt.title("Green Square Dash-Dot Line")
plt.show()
```

---

## 6️⃣ Designing **Multiple Lines in One Plot**

```python
y1 = x
y2 = x ** 2
y3 = x ** 3

plt.plot(x, y1, 'r--o', label='Linear')
plt.plot(x, y2, 'b-.s', label='Quadratic')
plt.plot(x, y3, 'g:d', label='Cubic')

plt.legend()
plt.title("Multiple Styled Lines")
plt.show()
```

---

## 7️⃣ Marker Size, Edge, and Transparency (Advanced Design)

```python
plt.plot(x, y,
         marker='o',
         markersize=10,
         markeredgecolor='k',
         markerfacecolor='y',
         alpha=0.7)
```

| Property          | Purpose      |
| ----------------- | ------------ |
| `markersize`      | Marker size  |
| `markeredgecolor` | Border color |
| `markerfacecolor` | Fill color   |
| `alpha`           | Transparency |

---

## 8️⃣ Using These Styles in **Seaborn**

Seaborn **uses Matplotlib internally**, so the same styles apply.

### Example: Line Plot in Seaborn

```python
import seaborn as sns

sns.lineplot(x=x, y=y,
             linestyle='--',
             marker='o',
             color='r')

plt.title("Seaborn Styled Line")
plt.show()
```

---

## 9️⃣ Seaborn with Multiple Lines & Markers

```python
sns.lineplot(x=x, y=y1, marker='o', linestyle='-', label='Line 1')
sns.lineplot(x=x, y=y2, marker='s', linestyle='--', label='Line 2')

plt.legend()
plt.show()
```

---

## 🔟 Heatmaps & Color Design in Seaborn

```python
import numpy as np

mat = np.random.rand(4, 4)

sns.heatmap(mat,
            annot=True,
            cmap='copper',
            linewidths=1,
            linecolor='white')
plt.title("Styled Heatmap")
plt.show()
```

## 🎯 Quick Reference Formula

```python
plt.plot(x, y, color='r', marker='o', linestyle='--')
```

or

```python
plt.plot(x, y, 'ro--')
```
